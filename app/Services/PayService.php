<?php

namespace App\Services;

use App\Exceptions\InvalidRequestException;
use Exception;
use Yansongda\Pay\Pay;
use Endroid\QrCode\QrCode;

class PayService
{
    public function alipayConfig()
    {
        $config = config('site.alipay');
        $config['return_url'] = route('common.pay.sync', module()['id']);
        $config['notify_url'] = route('common.pay.async', module()['id']);
        if (empty($config['mode'])) {
            unset($config['mode']);
        }
        return $config;
    }

    protected function checkParams($order)
    {
        foreach (['sn', 'price', 'subject'] as $key) {
            if (!key_exists($key, $order)) {
                throw new InvalidRequestException("支付宝请求参数「{$key}」不存在");
            }
        }
    }

    public function alipay(array $order, string $action = 'web')
    {
        $this->checkParams($order);

        $order['out_trade_no'] = $order['sn'];
        $order['total_amount'] = $order['price'];

        $alipay = Pay::alipay($this->alipayConfig())->$action($order);
        return $alipay->send();
    }

    public function wepayConfig()
    {
        $config = config('site.wepay');
        $config['notify_url'] = route('common.pay.wepayAsync', module()['id']);
        if (empty($config['mode'])) {
            unset($config['mode']);
        }
        return $config;
    }

    public function wepay(array $order, $action)
    {
        $method = 'wepay' . ucfirst($action);
        return $this->$method($order);
    }
    public function wepayScan(array $order)
    {
        $this->checkParams($order);

        $result =  Pay::wechat($this->wepayConfig())->scan([
            'out_trade_no' => $order['sn'],
            'body' => $order['subject'],
            'total_fee'      => $order['price'] * 100,
        ]);
        $qrCode = new QrCode($result['code_url']);
        header('Content-Type:' . $qrCode->getContentType());
        echo $qrCode->writeString();
        die;
    }

    public function wepayWap(array $order)
    {
        $this->checkParams($order);

        return Pay::wechat($this->wepayConfig())->wap([
            'out_trade_no' => $order['sn'],
            'body' => $order['subject'],
            'total_fee'      => $order['price'] * 100,
        ])->send();
    }
}
