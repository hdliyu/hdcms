<?php
namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserService{
    public function login(array $info){
        $user = User::where('email',$info['account'])->orWhere('mobile',$info['account'])->first();
        if($user){
            Auth::login($user);
            return true;
        }
        return false;
    }
}
