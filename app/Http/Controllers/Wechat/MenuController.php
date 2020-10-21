<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Wechat;
use Hdliyu\Wechat\Button;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function edit(Site $site,Wechat $wechat)
    {
        $site = site();
        return view('wechat.menu.edit',compact('site','wechat'));
    }

    public function update(Request $request,Site $site,Wechat $wechat)
    {
        $wechat->fill($request->all())->save();
        return response()->json(['message'=>'微信菜单保存成功']);
    }

    public function push(Request $request,Site $site,Wechat $wechat,Button $button)
    {
        config(['hdliyu.wechat'=>$wechat]);
        $button->create(['button'=>$wechat->menus]);
        return response()->json(['message' => '微信菜单推送成功']);
    }
}
