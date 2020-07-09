<?php

namespace App\Http\Controllers\Account;

use App\Services\CodeService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function index()
    {
        return view('account.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'=>['required'],
            'account'=>['required',$this->validateAccountField()],
            'password'=>['required','min:3','confirmed'],
            'password_confirmation'=>['required'],
            'name'=>['required','string'],
        ]);
    }

    public function code(Request $request,CodeService $codeService)
    {
        $request->validate([
            'account'=>['required',$this->validateAccountField()],
            'captcha'=>['required','captcha'],
        ]);
        $codeService->send($request->account);
        return response()->json(['message'=>'验证码发送成功']);
    }
}
