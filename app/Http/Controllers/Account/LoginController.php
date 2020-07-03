<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Rules\AccountRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('account.login');
    }


    public function store(Request $request)
    {
        $request->validate([
            'account'=>['required',new AccountRule],
            'password'=>['required','min:3'],
            'captcha'=>['required','captcha'],
        ]
        );
        $isLogin =  Auth::attempt([$this->username() => $request->account, 'password' => $request->password], (bool) $request->remember);
        if ($isLogin) {
            return redirect()->intended('/');
        }
        return back()->with('danger','帐号或密码错误');
    }

    protected function username()
    {
        return filter_var(request()->account,FILTER_VALIDATE_EMAIL)?'email':'mobile';
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }

}
