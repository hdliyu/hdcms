<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
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
            'account'=>['required'],
            'password'=>['required','min:3'],
            'password_confirmation'=>['required','confirm'],
            'captcha'=>['required','captcha'],
        ]);
    }

}
