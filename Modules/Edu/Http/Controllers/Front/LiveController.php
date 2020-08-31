<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Routing\Controller;

class LiveController extends Controller
{
    public function index()
    {
        return view('edu::live.index');
    }


}
