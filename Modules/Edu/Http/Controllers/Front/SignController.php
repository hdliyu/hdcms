<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Sign;
use Modules\Edu\Http\Requests\SignRequest;

class SignController extends Controller
{
    public function index()
    {
        $signs = Sign::today()->orderBy('created_at','desc')->get();
        return view('edu::sign.index',compact('signs'));
    }


    public function store(SignRequest $request,Sign $sign)
    {
        if(!hasSign()) {
            $sign['site_id'] = site()['id'];
            $sign['user_id'] = user('id');
            $sign->fill($request->input())->save();
            return back()->with('success', '签到成功');
        }
        return back()->with('warning','今日已签到');
    }

    public function destroy(Sign $sign)
    {
        $sign->delete();
        return back()->with('success','删除成功');
    }
}
