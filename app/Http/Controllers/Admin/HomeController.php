<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site;

class HomeController extends Controller
{
    public function setting()
    {
        return view('admin.setting');
    }
}
