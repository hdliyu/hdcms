<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Lesson;
use Modules\Edu\Entities\Tag;

class LessonController extends Controller
{

    public function index(Request $request)
    {
        $tags = Tag::site()->get();
        $lessons = Lesson::site()->search($request->w)->latest()->search($request->query('tag'))->paginate(9);
        return view('edu::front_lesson.index',compact('lessons','tags'));
    }

    public function show(Lesson $lesson)
    {
        return view('edu::front_lesson.show',compact('lesson'));
    }


}
