<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return view('edu::front.index');
    }

}
