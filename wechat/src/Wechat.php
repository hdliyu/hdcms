<?php
namespace Hdliyu\Wechat;

use Log;

class Wechat{
    protected $message;

    public function __construct()
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

}
