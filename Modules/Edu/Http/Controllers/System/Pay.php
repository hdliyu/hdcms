<?php

namespace Modules\Edu\System;

use Modules\Edu\Entities\Duration;
use Modules\Edu\Entities\Order;

class Pay
{
    public function notify($data)
    {
        $order = Order::where('sn', $data['sn'])->first();
        if ($order['status'] === false) {
            $order['status'] = true;
            $order->save();
            $this->changeDuration($order);
        }
        return redirect('/')->with('success', '会员订阅成功');
    }

    protected function changeDuration($order)
    {
        $duration = Duration::firstOrNew(['site_id' => site()['id'], 'user_id' => $order['user_id']]);
        if (empty($duration['end_time']) || $duration['end_time'] < now()) {
            $duration['end_time'] = now()->addMonth($order['month']);
        } elseif ($duration['end_time'] > now()) {
            $duration['end_time'] = $duration['end_time']->addMonth($order['month']);
        }
        $duration->save();
    }
}
