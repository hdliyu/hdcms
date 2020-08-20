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
        $signs = Sign::all();
        return view('edu::sign.index',compact('signs'));
    }


    public function store(SignRequest $request,Sign $sign)
    {
        $sign['site_id'] = site()['id'];
        $sign['user_id'] = user('id');
        $sign->fill($request->input())->save();
        return back()->with('success','签到成功');
    }


    public function destroy($id)
    {
    }
}
