<?php

namespace App\Http\Controllers\Account;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function follower(User $user)
    {
        if (user()->isFollower($user)) {
            user()->followers()->toggle($user);
        } else {
            user()->followers()->attach($user, [
                'site_id' => site()['id'],
                'module_id' => module()['id']
            ]);
        }
        return back();
    }

}
