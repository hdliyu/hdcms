<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\WechatRule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function show(WechatRule $rule)
    {
        return [
            'rule' => $rule,
            'keywords' => $rule->keywords
        ];
    }

    public function wechat()
    {
        return site()->wechats;
    }

    public function destroy(WechatRule $rule)
    {
        $rule->delete();
        return response()->json(['message' => '删除成功']);
    }
}
