<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Wechat;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent\Builder;

class UserController extends Controller
{
    public function search(Request $request, Wechat $wechat)
    {
        return User::whereHas('wechatUser', function (Builder $query) use ($wechat) {
            $query->where('wechat_id', $wechat['id']);
        })->search($request->name)->with('wechatUser')->limit(10)->get();
    }

    public function index(Request $request, Wechat $wechat = null)
    {
        $wechat = $wechat ?? site()->wechats()->first();

        $users = $wechat->users()->paginate(18);
        return view('wechat.user.index', compact('users', 'wechat'));
    }
}
