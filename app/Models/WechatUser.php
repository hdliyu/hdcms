<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class WechatUser extends Model
{
    protected $table = 'wechat_users';

    protected $fillable = ['site_id', 'wechat_id', 'user_id', 'type', 'openid', 'unionid', 'subscribe', 'nickname', 'sex', 'city', 'country', 'province', 'language', 'headimgurl', 'subscribe_time', 'remark', 'groupid', 'tagid_list', 'subscribe_scene', 'qr_scene', 'qr_scene_str'];

    protected $casts = [
        'subscribe_time' => 'datetime',
        'tagid_list' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
