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
        $site->roles->map(function ($role) use ($admin) {
            $admin->removeRole($role['name']);
        });
        $site->admins()->detach([$admin['id']]);
        return response()->json(['message' => '删除成功']);
    }

    public function role(Site $site, User $user)
    {
        return view('admin.role', compact('site', 'user'));
    }

    public function updateRole(Request $request, Site $site, User $user)
    {
        //删除无效的旧角色
        $site->roles->filter(function ($role) use ($request) {
            return !in_array($role['id'], $request->input('roles', []));
        })->map(function ($role) use ($user) {
            $user->removeRole($role['name']);
        });

        $user->assignRole($request->roles);

        return back()->with('success', '角色设置成功');
    }
}
