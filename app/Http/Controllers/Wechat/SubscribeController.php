<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Hdliyu\Wechat\Message;
use App\Models\Wechat as Model;
use Hdliyu\Wechat\Wechat;
use Illuminate\Http\Request;
use Log;

class SubscribeController extends Controller
{
    protected $model;

    public function handle(Model $model,Wechat $wechat,Message $message)
    {
        $this->model = $model;
        config(['hdliyu.wechat'=>$model]);
        $message->init();
        if($message->isSubscribe()){
            return $message->text(config('hdliyu.wechat.welcome'));
        }
        return $message->text(config('hdliyu.wechat.default_message'));
//        return $message->text('你好');
       /* return $message->news([
            ['title'=>'n你好1','description'=>'xxx','picurl'=>'http://front.wxnet.vip/xite/images/top/20170617104248203.png','url'=>'https://www.baidu.com'],
        ]);*/
    }
}
