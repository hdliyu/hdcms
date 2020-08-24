<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Edu\Entities\Sign;
use Modules\Edu\Entities\SignTotal;
use Modules\Edu\Http\Requests\SignRequest;
use function user;

class SignController extends Controller
{
    public function index()
    {
        $signs = Sign::day()->orderBy('created_at','desc')->get();
        return view('edu::sign.index',compact('signs'));
    }


    public function store(SignRequest $request,Sign $sign)
    {
        if(!hasSign()) {
            $sign['site_id'] = site()['id'];
            $sign['user_id'] = user('id');
            $sign->fill($request->input())->save();
            $this->updateSign();
            return back()->with('success', '签到成功');
        }
        return back()->with('warning','今日已签到');
    }

    protected function updateSign()
    {
        SignTotal::updateOrCreate([
            'site_id'=>site()['id'],
            'user_id'=>user('id'),
        ],[
            'month'=>user()->monthSign,
            'total'=>user()->totalSign,
        ]);
    }

    public function destroy(Sign $sign)
    {
        $this->authorize('delete',$sign);
        $sign->delete();
        $this->updateSign();
        return response()->json(['message'=>'删除成功']);
    }
}
