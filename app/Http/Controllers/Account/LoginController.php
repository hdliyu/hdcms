<?php

namespace App\Http\Controllers\Account;

use App\User;
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
            'account'=>['required',$this->validateAccountField()],
            'password'=>['required','min:3'],
            'captcha'=>['required','captcha'],
        ]);
        $isLogin =  Auth::attempt([$this->username() => $request->account, 'password' => $request->password],$request->has('remember'));
        if ($isLogin) {
            return redirect()->intended('/');
        }
        return back()->with('danger','帐号或密码错误');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

}
