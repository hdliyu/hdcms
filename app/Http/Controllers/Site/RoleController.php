<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Site;
use App\User;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Site::class, 'site');
    }

    public function index(Site $site)
    {
        return view('role.index',compact('site'));
    }

    public function create(Site $site)
    {
        return view('role.create',compact('site'));
    }

    public function store(RoleRequest $request,Site $site,Role $role)
    {
        $role->fill($request->only(['name','title']));
        $role->site_id = $site['id'];
        $role->save();
        return redirect()->route('site.role.index',$site)->with('success','添加角色成功');
    }

    public function edit(Site $site,Role $role)
    {
        return view('role.edit',compact('site','role'));
    }

    public function update(RoleRequest $request, Site $site,Role $role)
    {
        $role->fill($request->only(['name','title']))->save();
        return redirect()->route('site.role.index',$site)->with('success','修改角色成功');
    }

    public function destroy(Site $site,Role $role)
    {
        $role->delete();
        return response()->json(['message'=>'删除角色成功']);
    }
}
