<?php

namespace Modules\Edu\Channels;

use Illuminate\Notifications\Notification;

class SiteMessageChannel
{
    /**
     * 发送给定的通知。
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        return $notifiable->routeNotificationFor('database', $notification)->create(
            $this->buildPayload($notifiable, $notification)
        );
    }

    protected function buildPayload($notifiable, Notification $notification)
    {
        return [
            'id' => $notification->id,
            'type' => get_class($notification),
            'site_id' => site()['id'],
            'module_id' => module()['id'],
            'data' => $notification->toArray($notifiable),
            'read_at' => null,
        ];
    }
}
