<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function entry(Request $request)
    {
        $class = 'Modules\\' . module()['name'] . '\Http\Controllers\Front\HomeController';
        return call_user_func([app($class),'index']);
    }
}
