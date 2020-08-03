<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Lesson;
use Modules\Edu\Entities\Tag;
use Modules\Edu\Http\Requests\LessonRequest;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::where('site_id', site()['id'])->paginate();
        return view('edu::lesson.index', compact('lessons'));
    }

    public function search(Request $request)
    {
//        return Lesson::search($request->w)->limit(10)->get();
    }

    public function create(Lesson $lesson)
    {
        $tags = Tag::all();
        return view('edu::lesson.create', compact('lesson', 'tags'));
    }

    public function store(LessonRequest $request, Lesson $lesson)
    {
        $this->updateLesson($request, $lesson);
        return redirect()->route('edu.admin.lesson.index')->with('success', '课程保存成功');
    }

    protected function updateLesson($request, Lesson $lesson)
    {
        $lesson->fill($request->input());
        $lesson->status = $request->has('status');
        $lesson->site_id = site()['id'];
        $lesson->user_id = user('id');
        $lesson->save();
        $lesson->tags()->sync($request->tags);
        $this->updateVideos($request, $lesson);
    }

    protected function updateVideos($request, $lesson)
    {
        $videos = json_decode($request->videos, true);
        $lesson->videos()->whereNotIn('id', collect($videos)->pluck('id'))->delete();
        foreach ($videos as $i => $video) {
            if ($video['title'] && $video['path']) {
                $lesson->videos()->updateOrCreate([
                    'id' => $video['id']
                ], array_merge($video, ['rank' => $i, 'site_id' => site()['id']]));
            }
        }
        $lesson['video_num'] = $lesson->videos->count();
        $lesson->save();
    }
    public function edit(Lesson $lesson)
    {
        $tags = Tag::all();
        return view('edu::lesson.edit', compact('lesson', 'tags'));
    }

    public function update(LessonRequest $request, Lesson $lesson)
    {
        $this->updateLesson($request, $lesson);
        return redirect()->route('edu.admin.lesson.index')->with('success', '课程保存成功');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return response()->json(['message' => '删除成功']);
    }
}
