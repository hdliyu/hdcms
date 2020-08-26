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
];
