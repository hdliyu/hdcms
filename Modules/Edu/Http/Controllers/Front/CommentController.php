<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Comment;

class CommentController extends Controller
{

    public function index()
    {
        $comments = $this->model()->comments()->with('user')->orderBy('id','desc')->get();
        return response()->json(['comments'=>$comments]);
    }

    public function store(Request $request,$model,$id)
    {
        $comment = $this->model()->comments()->create([
            'site_id'=>site()['id'],
            'user_id'=>user()->id,
            'content'=>$request['content']
        ]);
        $comment['user'] = user();
        return response()->json(['message'=>'发表成功','comment'=>$comment]);
    }

    public function model()
    {
        $class = 'Modules\Edu\Entities\\' . request()->model;
        return app($class)->find(request()->id);
    }

}
