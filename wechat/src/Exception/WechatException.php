<?php
namespace Hdliyu\Wechat\Exception;

use Exception;
use Throwable;

class WechatException extends Exception{

   public function __construct($message = "", $code = 0, Throwable $previous = null)
   {
       parent::__construct($message, $code, $previous);
       $this->config = include __DIR__.'/error.php';
   }

   public function __toString()
  {
      return $this->config[$this->code]??$this->message;
  }
}
