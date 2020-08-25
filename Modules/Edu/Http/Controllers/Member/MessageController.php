<?php

namespace Modules\Edu\Http\Controllers\Member;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class MessageController extends Controller
{

    public function index()
    {
        $notifications = user()->unreadNotifications()->paginate();
        return view('edu::member.message', compact('notifications'));
    }

    public function show($message)
    {
        $notification = user()->notifications()->where('id', $message)->first();
        $notification->markAsRead();

        return redirect($notification->data['action']);
    }

    public function destroy($message)
    {
        user()->notifications()->where('id', $message)->delete();
        return response()->json(['message' => '删除成功']);
    }
}
