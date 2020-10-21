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
        'type' => 'wechat',
        'items' => [
            ['title' => '文本消息', 'route' => route('wechat.text.index'), 'permission' => 'wechat.text.index'],
            ['title' => '图文消息', 'route' => route('wechat.news.index'), 'permission' => 'wechat.news'],
        ],
    ], [
        'title' => '微信素材管理',
        'show' => true,
        'icon' => 'fab fa-weixin',
        'type' => 'wechat',
        'items' => [
            ['title' => '图片素材', 'route' => route('wechat.material.index', ['type' => 'image']), 'permission' => 'wechat.material.image'],
            ['title' => '语音素材', 'route' => route('wechat.material.index', ['type' => 'voice']), 'permission' => 'wechat.material.voice'],
            ['title' => '图文素材', 'route' => route('wechat.material.index', ['type' => 'news']), 'permission' => 'wechat.material.news'],
        ],
    ], [
        'title' => '微信用户管理',
        'show' => true,
        'icon' => 'fab fa-weixin',
        'type' => 'wechat',
        'items' => [
            ['title' => '粉丝列表', 'route' => route('wechat.user.index'), 'permission' => 'wechat.user.index'],
        ],
    ],
];
