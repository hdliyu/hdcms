<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wechat extends Model
{
    protected $fillable = [
        'site_id', 'title', 'introduce', 'name', 'qr', 'type', 'wechat_id', 'appID', 'appsecret', 'token', 'welcome', 'default_message'
    ];

    protected $casts = [
        'menus' => 'array',
    ];

}
