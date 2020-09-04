<?php

namespace Modules\Edu\Http\Controllers\Front;

use Auth;
use GatewayClient\Gateway;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ChatController extends Controller
{
    public function __construct()
    {
        Gateway::$registerAddress = '127.0.0.1:1238';
    }

    public function init()
    {
        $this->sendToAll('进入直播间');
    }

    public function send(Request $request)
    {
        $this->sendToAll($request['content']);
    }

    protected function sendToAll($content)
    {
        if (Auth::check()) {
            Gateway::sendToAll(json_encode([
                'user' => ['id' => user('id'), 'nickname' => user('nickname')],
                'content' => $content,
            ]));
        }
    }
}
