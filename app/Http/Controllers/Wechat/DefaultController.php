<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Wechat;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function edit(Site $site,Wechat $wechat)
    {
       $site = site();
       return view('wechat.default.edit',compact('site','wechat'));
    }

    public function update(Request $request,Site $site,Wechat $wechat)
    {
        $wechat->fill($request->all())->save();
        return back()->with('success', '默认回复设置成功');
    }
}
