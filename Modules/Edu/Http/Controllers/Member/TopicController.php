<?php

namespace Modules\Edu\Http\Controllers\Member;

use App\Notifications\CommentNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class TopicController extends Controller
{
    public function index()
    {
        $topics = user()->make()->topics()->latest()->paginate();
        return view('edu::member.topic', compact('topics'));
    }
}
