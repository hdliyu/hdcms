<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(Request $request,User $user)
    {
        $post = $this->validate($request,[
            'email'=>['sometimes','email'],
            'name'=>['required','min:3','max:50'],
            'password'=>['required','min:5','max:50','confirmed'],
        ]);
        $user->name = $post['name'];
        $user->email = $post['email'];
        $user->password = $post['password'];
        return $user;
    }
}
