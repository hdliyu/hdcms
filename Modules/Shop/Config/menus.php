<?php
return [
    [
        'title' => '基本配置',
        'show' => true,
        'icon' => '',
        'items' => [
            ['title' => '标签管理', 'route' => 'Edu.admin.lesson.create.index', 'permission' => 'tags'],
        ],
    ],
    [
        'title' => '课程管理',
        'show' => true,
        'icon' => '',
        'items' => [
            ['title' => '课程列表', 'route' => 'Edu.admin.lesson.create.index', 'permission' => 'lesson-index'],
            ['title' => '课程列表', 'route' => 'Edu.admin.lesson.create.create', 'permission' => 'add-lesson'],
        ],
    ],
    [
        'title' => '系统课程',
        'items' => [
            ['title' => '系统课程', 'permission' => 'system'],
            ['title' => '添加系统课程', 'permission' => 'add-system'],
        ]
    ],
    [
        'title' => '会员订单',
        'items' => [
            ['title' => '会员套餐', 'permission' => 'pcakage-index'],
            ['title' => '订单列表', 'permission' => 'orders'],
        ]
    ]
];
