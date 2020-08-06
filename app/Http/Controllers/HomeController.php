<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function entry(Request $request)
    {
        $route = strtolower(module()['name']) . '.front.home';
        if (Route::has($route)) {
            return Route::respondWithRoute($route);
        } else {
            $message = sprintf("【%s】站点的\"%s\"模块没有定义路由\"%s\"", site()['name'], module()['title'], $route);
            abort(500, $message);
        }
//        $class = 'Modules\\' . module()['name'] . '\Http\Controllers\Front\HomeController';
//        return app($class)->index();
    }
}
