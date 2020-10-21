<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Http\Requests\WechatRequest;
use App\Models\Site;
use App\Models\Wechat;
use Illuminate\Http\Request;

class WechatController extends Controller
{

    public function index(Site $site)
    {
        $wechats = Wechat::where('site_id',$site->id)->get();
        return view('wechat.wechat.index',compact('site','wechats'));
    }


    public function create(Site $site,Wechat $wechat)
    {
        return view('wechat.wechat.create',compact('site','wechat'));
    }

    public function store(WechatRequest $request,Site $site,Wechat $wechat)
    {
        $wechat->site_id = $site['id'];
        $wechat->fill($request->all())->save();
        return redirect()->route('wechat.wechat.index',$site)->with('success','添加公众号成功');
    }

    public function edit(Site $site,Wechat $wechat)
    {
        return view('wechat.wechat.edit',compact('site','wechat'));
    }


    public function update(WechatRequest $request,Site $site, Wechat $wechat)
    {
        $wechat->fill($request->all())->save();
        return redirect()->route('wechat.wechat.index',$site)->with('success','保存成功');
    }

    public function destroy(Site $site,Wechat $wechat)
    {
        $wechat->delete();
        return response()->json(['message'=>'公众号删除成功']);
    }
}
