<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Order;
use Modules\Edu\Entities\Subscribe;
use App\Services\PayService;
use Browser;
use Endroid\QrCode\QrCode;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['pay']);
    }

    public function index()
    {
        $subscribes = Subscribe::all();
        return view('edu::subscribe_front.index',compact('subscribes'));
    }

    protected function order(Subscribe $subscribe)
    {
        $order['user_id'] = user('id');
        $order['site_id'] = site()['id'];
        $order['subject'] = $subscribe['title'];
        $order['type'] = 'subscribe';
        $order['month'] = $subscribe['month'];
        $order['price'] = $subscribe['price'];
        $order['sn'] = 'S' . site()['id'] . '-U' . user('id') . '-' . date('Ymdhis');
        return Order::create($order);
    }

    public function pay(Subscribe $subscribe, PayService $payService)
    {
        $order = $this->order($subscribe);
        $payService->alipay($order->toArray(), Browser::isDesktop() ? 'web' : 'wap');
    }

    public function wepay(Subscribe $subscribe,  PayService $payService)
    {
        $order = $this->order($subscribe);
        $payData = [
            'out_trade_no' => $order['sn'],
            'body' => $order['subject'],
            'total_fee'      => $order['price'] * 100,
        ];

        if (Browser::isDesktop()) {
            $payService->wepay($order->toArray(), 'scan');
        } else {
            return $payService->wepay($payData, 'wap')->send();
        }
    }
}
