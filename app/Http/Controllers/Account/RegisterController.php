<?php

namespace App\Http\Controllers\Account;

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

    public function code(Request $request)
    {
        $request->validate([
            'account'=>['required',$this->validateAccountField()],
            'captcha'=>['required','captcha'],
        ]);
    }
}
