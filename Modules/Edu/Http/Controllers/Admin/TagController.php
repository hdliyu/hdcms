<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Tag;

class TagController extends Controller
{

    public function index()
    {
        access('tags');
        $tags = Tag::where('site_id',site()['id'])->get();
        return view('edu::tag.index',compact('tags'));
    }

    public function store(Request $request)
    {
        Tag::where('site_id',site()['id'])->whereNotIn('id', $request->ids??[])->delete();
        if($titles = $request->title){
            foreach ($titles as $index => $title) {
                if ($title && !Tag::where('title', $title)->exists()) {
                    Tag::updateOrCreate([
                        'id' => $request->ids[$index],
                    ], ['title' => $title, 'site_id' => site()['id']]);
                }
            }
        }
        return back()->with('success', '保存成功');
    }

}
