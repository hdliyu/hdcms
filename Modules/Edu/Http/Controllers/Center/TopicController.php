<?php

namespace Modules\Edu\Http\Controllers\Center;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class TopicController extends Controller
{

    public function index(User $user)
    {
        $topics = $user->make()->topics()->paginate();
        return view('edu::center.topic', compact('user', 'topics'));
    }
}
