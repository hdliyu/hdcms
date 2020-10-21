<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\WechatNews;
use App\Services\WechatService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = WechatNews::site()->module()->get();
        return view("wechat.news.index", compact('news'));
    }

    public function create()
    {
        return view("wechat.news.create");
    }

    public function store(Request $request, WechatService $wechatService, WechatNews $weChatNews)
    {
        $rule = $wechatService->save('news');
        $weChatNews->site_id = site()['id'];
        $weChatNews->module_id = module()['id'];
        $weChatNews->rule_id = $rule['id'];
        $weChatNews->contents = json_decode($request->contents, true);
        $weChatNews->save();

        return redirect()->route('wechat.news.index')->with('success', '微信图文消息添加成功');
    }

    public function show(WechatNews $news)
    {
        return $news->contents;
    }

    public function edit(WechatNews $news)
    {
        return view("wechat.news.edit", compact('news'));
    }

    public function update(Request $request, WechatService $wechatService, WechatNews $news)
    {
        $wechatService->save('news');
        $news->contents = json_decode($request->contents, true);
        $news->save();

        return redirect()->route('wechat.news.index')->with('success', '微信图文消息修改成功');
    }

    public function destroy(WechatNews $weChatNews)
    {
    }
}
