<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Comment;
use Modules\Edu\Transformers\CommentCollection;
use Modules\Edu\Transformers\CommentResource;

class CommentController extends Controller
{

    public function index(Request $request)
    {
        $comments = $this->model()->comments()->orderBy('id','desc')->get();
        return new CommentCollection($comments);
        //return response()->json(['comments'=>CommentResource::collection($comments)]);
    }

    public function store(Request $request,$model,$id)
    {
        $comment = $this->model()->comments()->create([
            'site_id'=>site()['id'],
            'user_id'=>user()->id,
            'content'=>$request['content'],
            'reply_user_id'=>$request['reply_user_id'],
        ]);
        return response()->json(['message'=>'发表成功','comment'=>new CommentResource($comment)]);
    }

    public function model()
    {
        $class = 'Modules\Edu\Entities\\' . request()->model;
        return app($class)->find(request()->id);
    }

    public function destroy($model, $id,Comment $comment)
    {
        $comment->delete();
        return response()->json(['messageC'=>'删除成功']);
    }

}
