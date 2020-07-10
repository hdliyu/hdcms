<?php

namespace App\Http\Controllers\Account;

use App\Rules\VerificationCodeRule;
use App\Services\CodeService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{

    public function index()
    {
        return view('account.register');
    }

    public function store(Request $request,User $user)
    {
        $request->validate([
            'code'=>['required',new VerificationCodeRule($request->account)],
            'account'=>['required',$this->validateAccountField(),Rule::unique('users',$this->username())],
            'password'=>['required','min:3','confirmed'],
            'password_confirmation'=>['required'],
        ],['code.required'=>'验证码不能为空']);
        $user->password = $request->password;
        $user[$this->username()] = $request->account;
        $user->save();
        Auth::login($user);
        return response()->json(['message'=>'注册成功，已为你自动登录']);
    }

    public function code(Request $request,CodeService $codeService)
    {
        $request->validate([
            'account'=>['required',$this->validateAccountField(),Rule::unique('users',$this->username())],
            'captcha'=>['required','captcha'],
        ]);
        $codeService->send($request->account);
        return response()->json(['message'=>'验证码发送成功']);
    }
}
