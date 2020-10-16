<?php
namespace Hdliyu\Wechat\Message;


trait Send{

    public function text($content)
    {
        $xml=<<<php
<xml>
  <ToUserName><![CDATA[%s]]></ToUserName>
  <FromUserName><![CDATA[%s]]></FromUserName>
  <CreateTime>%s</CreateTime>
  <MsgType><![CDATA[text]]></MsgType>
  <Content><![CDATA[%s]]></Content>
</xml>
php;
        return sprintf($xml,$this->FromUserName,$this->ToUserName,time(),$content);
    }

    public function news(array $data)
    {
        $xml=<<<xml
<xml>
  <ToUserName><![CDATA[%s]]></ToUserName>
  <FromUserName><![CDATA[%s]]></FromUserName>
  <CreateTime>%s</CreateTime>
  <MsgType><![CDATA[news]]></MsgType>
  <ArticleCount>%s</ArticleCount>
  <Articles>
    %s
  </Articles>
</xml>
xml;
        $news = '';
        $articleXml = <<<php
<item>
      <Title><![CDATA[%s]]></Title>
      <Description><![CDATA[%s]]></Description>
      <PicUrl><![CDATA[%s]]></PicUrl>
      <Url><![CDATA[%s]]></Url>
    </item>
php;
        foreach ($data as $article){
            $news.=sprintf($articleXml,$article['title'],$article['description'],$article['picurl'],$article['url']);
        }
        return sprintf($xml,$this->FromUserName,$this->ToUserName,time(),count($data),$news);
    }
}
