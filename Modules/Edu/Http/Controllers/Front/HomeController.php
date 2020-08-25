<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Study;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    public function index()
    {
        $activities = Activity::latest()->paginate();
        $studys = Study::latest()->take(10)->get();
        return view('edu::index', compact('activities','studys'));
    }
}
