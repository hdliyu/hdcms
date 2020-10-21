<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\WechatKeyword;
use App\Services\WechatService;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    public function check(Request $request, WechatService $wechatService)
    {
        return [
            'has' => $wechatService->checkKeywordIsExits($request->keyword)
        ];
    }
}
