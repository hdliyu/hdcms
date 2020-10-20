<?php
return [
    [
        'title' => '基础功能',
        'show' => true,
        'icon' => 'fas fa-briefcase',
        'items' => [
            ['title' => '模块配置', 'route' => route('module.config.edit'), 'permission' => 'config'],
        ],
    ],
    [
        'title' => '微信公众号',
        'show' => true,
        'icon' => 'fab fa-weixin',
        'items' => [
            ['title' => '文本消息', 'route' => '', 'permission' => 'wechat.text.index'],
            ['title' => '图文消息', 'route' => '', 'permission' => 'config'],
        ],
    ],
];
