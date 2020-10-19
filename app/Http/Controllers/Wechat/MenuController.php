<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Wechat;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function edit(Site $site,Wechat $wechat)
    {
//        dd($wechat->menus);
        return view('wechat.menu.edit',compact('site','wechat'));
    }

    public function update(Request $request,Site $site,Wechat $wechat)
    {
        $wechat->fill($request->all())->save();
        return response()->json(['message'=>'微信菜单保存成功']);
    }

}
