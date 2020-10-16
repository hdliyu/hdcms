<?php
namespace Hdliyu\Wechat;

use Hdliyu\Wechat\Message\MsgType;
use Hdliyu\Wechat\Message\Send;

class Message extends Wechat {
    use Send,MsgType;
}
