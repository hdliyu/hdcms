<?php

namespace App\Http\Controllers;

use Hdliyu\Wechat\Wechat;
use Illuminate\Http\Request;

class WechatController extends Controller
{
    public function handle(Wechat $wechat)
    {
        \Log::info($wechat->message);
    }
}
