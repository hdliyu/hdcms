<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Models\Package;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index()
    {
        $groups = Group::all();
        return view('group.index',compact('groups'));
    }

    public function create()
    {
        $packages = Package::all();
        return view('group.create',compact('packages'));
    }

    public function store(GroupRequest $request,Group $group)
    {
        $group = Group::create($request->input());
        $group->packages()->sync($request->input('packages'));
        return redirect()->route('admin.group.index')->with('success','用户组添加成功');
    }

    public function edit(Group $group)
    {
        $packages = Package::all();
        return view('group.edit',compact('packages','group'));
    }

    public function update(GroupRequest $request, Group $group)
    {
        $group->fill($request->input())->save();
        $group->packages()->sync($request->input('packages'));
        return redirect()->route('admin.group.index')->with('success','用户组修改成功');
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return response()->json(['message'=>'用户组删除成功']);
    }
}
