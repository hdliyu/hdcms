<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Services\LiveService;
use App\Services\ConfigService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Log;
use Str;

class LiveController extends Controller
{
    public function index()
    {
        return view('edu::live.index');
    }

    public function push(LiveService $liveService, ConfigService $ConfigService)
    {
        $config = config('module.live');
        $stream = Str::random(10);
        $pushUrl = $liveService->pushUrl($config['push_url'], 'houdunren', $stream, $config['push_key']);
        $playUrls = $liveService->playUrl($config['play_url'], 'houdunren', $stream, $config['play_key']);

        $ConfigService->saveCurrentModuleConfig([
            'push' => $pushUrl, 'play' => $playUrls, 'is_live' => false
        ]);

        $res = $liveService->notify(
            config('site.aliyun.accessKeyId'),
            config('site.aliyun.accessKeySecret'),
            $config['push_url'],
            route('edu.front.live.notify')
        );
        return back()->with('success', '直播地址已生成');
    }

    public function notify(Request $request, ConfigService $ConfigService)
    {
        // Log::info($request->all());
        switch ($request->input('action')) {
            case 'publish_done':
                $ConfigService->saveCurrentModuleConfig([
                    'is_live' => false
                ]);
                break;
            case 'publish':
                $ConfigService->saveCurrentModuleConfig([
                    'is_live' => true
                ]);
                break;
        }
    }
}
