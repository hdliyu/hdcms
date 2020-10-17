<?php

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use Hdliyu\Wechat\Message;
use Hdliyu\Wechat\Wechat;
use App\Models\Wechat as Model;
use Illuminate\Http\Request;
use Log;

class SubscribeController extends Controller
{
    protected $wechat;

    public function __construct()
    {
       $this->wechat = Model::where('id',request()->query('id'))->firstOrFail();
       config(['hdliyu.wechat'=>$this->wechat->toArray()]);
       //Log::info(config('hdliyu.wechat'));
    }

    public function handle(Request $request,Wechat $wechat,Message $message)
    {
        if($message->isSubscribe()){
            return $message->text($this->wechat->welcome);
        }
        return $message->text(site()['title']);
//        return $message->text('你好');
       /* return $message->news([
            ['title'=>'n你好1','description'=>'xxx','picurl'=>'http://front.wxnet.vip/xite/images/top/20170617104248203.png','url'=>'https://www.baidu.com'],
        ]);*/
    }
}
