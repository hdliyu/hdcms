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
            'code'=>['required'],
            'account'=>['required','string'],
            'password'=>['required','min:3','confirmed'],
            'password_confirmation'=>['required'],
            'name'=>['required','string'],
        ]);
    }

}
