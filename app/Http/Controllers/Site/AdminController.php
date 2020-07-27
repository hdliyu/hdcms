<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(Site $site)
    {
        return view('admin.index',compact('site'));
    }

    public function search(Request $request)
    {
        return User::search($request->name)->limit(10)->get();
    }

    public function add(Request $request, Site $site, User $user)
    {
        $site->admins()->syncWithoutDetaching([$user['id']]);
        return back()->with('success', '管理员设置成功');
    }

    public function destroy(Site $site, User $admin)
    {
        $site->admins()->detach([$admin['id']]);
        return response()->json(['message' => '删除成功']);
    }
}
