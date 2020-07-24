<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MyRequest;

class MyController extends Controller
{

    public function edit()
    {
        return view('my.edit');
    }


    public function update(MyRequest $request)
    {
        $user = auth()->user();
        $user->fill($request->except('password'));
        if($password = $request->password){
            $user->password = $password;
        }
        $user->save();
        return back()->with('success','资料修改成功');
    }


}
