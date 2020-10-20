<?php
namespace Hdliyu\Wechat\Button;

use App\Models\Wechat;
use Exception;
use Hdliyu\Wechat\Exception\WechatException;
use Illuminate\Support\Facades\Http;

trait CreateButton{
    public function create($button)
    {
       $url = sprintf('%s/menu/create?access_token=%s',$this->api,$this->token());
       $response = Http::send('POST',$url,['body'=>json_encode($button,JSON_UNESCAPED_UNICODE)])->throw()->json();
       if($response['errcode']==0){
           return true;
       }
       throw new WechatException($response['errmsg'],$response['errcode']);
    }
}
