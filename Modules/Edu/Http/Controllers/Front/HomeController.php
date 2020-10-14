<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Study;
use Modules\Edu\Entities\User;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{

    public function index()
    {
        $dynamics = Study::where('site_id',site()['id'])->latest()->take(10)->get();
        $activities = Activity::latest()->paginate();
        return view('edu::index', compact('activities','dynamics'));
    }
}
