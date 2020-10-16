<?php
namespace Hdliyu\Wechat\Message;

trait MsgType{

    public function isText()
    {
        return $this->MsgType == 'text';
    }

    public function isImage()
    {
        return $this->MsgType == 'image';
    }

    public function isVoice()
    {
        return $this->MsgType == 'voice';
    }

    public function isVideo()
    {
        return $this->MsgType == 'video';
    }

    public function isMusic()
    {
        return $this->MsgType == 'music';
    }

    public function isSubscribe()
    {
        return $this->MsgType == 'event' && $this->Event == 'subscribe';
    }

    public function isUnsubscribe()
    {
        return $this->MsgType == 'event' && $this->Event == 'unsubscribe';
    }
}
