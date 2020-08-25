<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Edu\Entities\Tag;
use Modules\Edu\Entities\Topic;
use Modules\Edu\Http\Requests\TopicRequest;

class TopicController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
//        $this->authorizeResource(Topic::class, 'topic');
    }

    public function index(Request $request)
    {
        $topics = Topic::search($request->w)->latest()->paginate();
        return view('edu::topic.index', compact('topics'));
    }


    public function create(Topic $topic)
    {
        $tags = Tag::all();
        return view('edu::topic.create',compact('tags','topic'));
    }

    public function store(Request $request,Topic $topic)
    {
        $topic['site_id'] = site()['id'];
        $topic['user_id'] = user('id');
        $topic->fill($request->input())->save();
        $topic->tags()->sync($request->input('tags'));
        return redirect()->route('edu.front.topic.show', $topic)->with('success', '发表成功');
    }

    public function show(Topic $topic)
    {
        return view('edu::topic.show', compact('topic'));
    }

    public function edit(Topic $topic)
    {
        $this->authorize('update', $topic);
        $tags = Tag::all();
        return view('edu::topic.edit', compact('topic', 'tags'));
    }

    public function update(Request $request, Topic $topic)
    {
        $this->authorize('update', $topic);
        $topic->fill($request->input())->save();
        $topic->tags()->sync($request->input('tags'));
        return redirect()->route('edu.front.topic.show', $topic)->with('success', '贴子修改成功');
    }

    public function destroy(Request $request, Topic $topic)
    {
        $this->authorize('delete', $topic);
        $topic->delete();
        if ($request->expectsJson())
            return response()->json(['message' => '删除成功']);
        return redirect()->route('edu.front.topic.index');
    }
}
