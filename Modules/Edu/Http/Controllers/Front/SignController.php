<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Edu\Entities\Sign;
use Modules\Edu\Entities\SignTotal;
use Modules\Edu\Entities\User;
use Modules\Edu\Http\Requests\SignRequest;

class SignController extends Controller
{
    public function index()
    {
        $signs = Sign::site()->with('signTotal')->whereYear('created_at', now())->whereMonth('created_at', now())->whereDay('created_at', now())->get();
        // dd($signs->toArray());
        return view('edu::sign.index', compact('signs'));
    }

    public function store(SignRequest $request, Sign $sign)
    {
        if (user()->make()->isSign) {
            return back()->with('danger', '今日已签到');
        }
        $sign['site_id'] = site()['id'];
        $sign['user_Id'] = Auth::id();
        $sign->fill($request->input())->save();

        $this->updateTotal();

        return back();
    }

    protected function updateTotal()
    {
        SignTotal::updateOrCreate([
            'site_id' => site()['id'],
            'user_id' => user()['id']
        ], [
            'total' => user()->make()->signTotal,
            'month' => user()->make()->monthSign
        ]);
    }

    public function destroy(Sign $sign)
    {
        $this->authorize('delete', $sign);
        $sign->delete();
        $this->updateTotal();
        return response()->json(['message' => '删除成功']);
    }
}
