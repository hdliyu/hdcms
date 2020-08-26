<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Services\LiveService;
use App\Services\ConfigService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Log;
use Str;

class LiveController extends Controller
{
    public function index()
    {
        return view('edu::live.index');
    }


}
