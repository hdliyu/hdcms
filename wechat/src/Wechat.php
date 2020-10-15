<?php
namespace Hdliyu\Wechat;

class Wechat{
    public $message;

    public function __construct()
    {
        $this->bind();
        $this->message = $this->getMessage();
        \Log::info($this->message);
    }

    protected function getMessage()
    {
        $message = (array)simplexml_load_string(file_get_contents('php://input'));
        return $message;
    }


    protected function bind()
    {
        if(isset($_GET['ignature'],$_GET['timestamp'],$_GET['nonce'],$_GET['echostr'])){
            $signature = $_GET['ignature'];
            $timestamp = $_GET['timestamp'];
            $nonce = $_GET['nonce'];
            $token = config('hdliyu.wechat.token');
            $tmpArr = [$token, $timestamp, $nonce];
            sort($tmpArr, SORT_STRING);
            if( sha1(implode( $tmpArr )) == $signature ){
                die($_GET['echostr']);
            }
            return false;
        }

    }

}
