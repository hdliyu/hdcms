<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use App\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function entry(string $path, MenuService $menuService)
    {
        $url = $menuService->getCurrentRoute($path);

        return redirect($url);
    }

    public function changeType(string $type, MenuService $menuService)
    {
        $menuService->type($type);
        return \redirect()->back();
    }
}
