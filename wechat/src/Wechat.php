<?php
namespace Hdliyu\Wechat;

use Hdliyu\Wechat\Message\MsgType;
use Hdliyu\Wechat\Message\Send;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Log;

class Wechat{
    use Send,MsgType;
    protected $message;
    protected $api = 'https://api.weixin.qq.com/cgi-bin';

    public function init()
    {
        $this->bind();
        $this->getMessage();
    }

    public function getMessage()
    {
        $content = file_get_contents('php://input');
        if($content){
            return $this->message = simplexml_load_string($content);
        }
    }

    public function __get($name)
    {
        return $this->message->$name??null;
    }

    protected function bind()
    {
        if(isset($_GET['signature'],$_GET['timestamp'],$_GET['nonce'],$_GET['echostr'])){
            $signature = $_GET['signature'];
            $timestamp = $_GET['timestamp'];
            $nonce = $_GET['nonce'];
            $token = config('hdliyu.wechat.token');
            $tmpArr = [$token, $timestamp, $nonce];
            sort($tmpArr, SORT_STRING);
            if( sha1(implode( $tmpArr )) == $signature ){
                die($_GET['echostr']);
            }else{
                return false;
            }
        }
    }

    public function token()
    {
        return Cache::remember('access_token', 7200, function () {
            $url = sprintf('%s/token?grant_type=client_credential&appid=%s&secret=%s',$this->api,config('hdliyu.wechat.appID'),config('hdliyu.wechat.appsecret'));
            $response = Http::get($url)->throw()->json();
            return $response['access_token']??null;
        });
    }
}
