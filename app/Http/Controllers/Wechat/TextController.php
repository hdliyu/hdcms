<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\WechatText;
use App\Services\WechatService;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index()
    {
        $texts = WechatText::where('site_id', site()['id'])->where('module_id', module()['id'])->get();
        return view('wechat.text.index', compact('texts'));
    }

    public function create()
    {
        return view('wechat.text.create');
    }

    public function store(Request $request, WechatService $wechatService, WechatText $weChatText)
    {
        $rule = $wechatService->save('text');

        $weChatText->create([
            'site_id' => site()['id'],
            'module_id' => module()['id'],
            'rule_id' => $rule['id'],
            'contents' => json_decode($request->contents, true)
        ]);

        return redirect()->route('wechat.text.index')->with('success', '文本消息添加成功');
    }

    public function show(WechatText $text)
    {
        return $text;
    }


    public function edit(WechatText $text)
    {
        return view('wechat.text.edit', compact('text'));
    }

    public function update(Request $request, WechatText $text, WechatService $wechatService)
    {
        $wechatService->save('text');
        $text->contents = json_decode($request->contents, true);
        $text->save();

        return redirect()->route('wechat.text.index')->with('success', '文本消息修改成功');
    }

    public function destroy(WechatText $weChatText)
    {
    }
}
