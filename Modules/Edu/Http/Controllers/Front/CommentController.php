<?php

namespace Modules\Edu\Http\Controllers\Front;

use Modules\Edu\Notifications\CommentNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Comment;
use Modules\Edu\Transformers\CommentCollection;
use Modules\Edu\Transformers\CommentResource;

class CommentController extends Controller
{

    public function index()
    {
        $comments = $this->model()->comments()->orderBy('id', 'asc')->get();
        return new CommentCollection($comments);
    }

    public function store(Request $request, $model, $id)
    {
        $model  = $this->model();
        $comment = $model->comments()->create($request->input() + [
                'site_id' => site()['id'],
                'user_id' => user('id'),
            ]);
        $this->updateModelCount();
        $this->notify($comment, $model);
        return response()->json(['message' => '评论发表成功', 'comment' => new CommentResource($comment)]);
    }

    //发送通知
    protected function notify($comment, $model)
    {
//        if ($comment->user->id === $model->user->id) return;
        $type = $model::type;
        $title = "你的 $type [{$model->title}] 收到了来自 " . $comment->user->name . ' 的评论';
        $action = $model->link;
        $model->user->notify(new CommentNotification($title, $action));
    }

    protected function updateModelCount()
    {
        $model = $this->model();
        $model->comment_count = $model->comments()->count();
        $model->save();
    }

    protected function model()
    {
        $class = 'Modules\Edu\Entities\\' . request()->model;
        return app($class)->find(request()->id);
    }

    public function destroy($model, $id, Comment $comment)
    {
        $comment->delete();
        $this->updateModelCount();
        return response()->json(['message' => '删除成功']);
    }

}
