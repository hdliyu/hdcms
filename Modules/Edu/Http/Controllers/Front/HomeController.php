<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Traits\Study;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    use Study;
    public function index()
    {
        $activities = Activity::latest()->paginate();
        $studys = $this->study();
        return view('edu::index', compact('activities','studys'));
    }
}
