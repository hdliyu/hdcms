<?php

namespace App\Services;

class MenuService
{
    public function type(string $type = null)
    {
        if ($type) session(['menu.type' => $type]);
        return session('menu.type', 'module');
    }

    public function getCurrentRoute(string $path)
    {
        $info  = explode('-', $path);
        $menu = module()['menus'][$info[0]]['items'][$info[1]];

        session(['module_menu_index' => $info[0]]);
        return $menu['route'];
    }
}
