<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Services\PayService;
use Log;
use Route;
use Yansongda\Pay\Pay;

class PayController extends Controller
{
    public function __construct()
    {
        $this->middleware('front');
    }

    //支付的同步方法
    public function sync(Module $module, PayService $payService)
    {
        $data = Pay::alipay($payService->alipayConfig())->verify()->toArray();
        //通知模块
        return $this->moduleNotify($module, $data);
    }

    public function async(Module $module, PayService $payService)
    {
        $alipay = Pay::alipay($payService->alipayConfig());
        $data = $alipay->verify();
        $this->moduleNotify($module, $data);

        return $alipay->success();
    }

    public function wepayAsync(Module $module, PayService $payService)
    {
        $pay = Pay::wechat($payService->wepayConfig());
        $data = $pay->verify();
        $this->moduleNotify($module, $data);
        return $pay->success();
    }

    //通知模块改变定单状态
    protected function moduleNotify($module, $data)
    {
        //通知模块
        $data['sn'] = $data['out_trade_no'];
        $class = 'Modules\\' . $module['name'] . '\System\Pay';
        return app($class)->notify($data);
    }
}
