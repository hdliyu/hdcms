<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Rules\AccountRule;
use App\Services\UserService;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        return view('account.login');
    }


    public function store(Request $request,UserService $userService)
    {
        $request->validate([
            'account'=>['required',new AccountRule],
            'password'=>['required','min:3'],
//            'captcha'=>['required','captcha'],
        ]);
        $isLogin = $userService->login($request->only(['account','password']));
        if($isLogin){
            return redirect('/');
        }
        return back();
    }


}
