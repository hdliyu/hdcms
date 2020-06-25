<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends ApiController
{

    public function index()
    {
        return $this->json(Group::all());
    }


    public function store(Request $request,Group $group)
    {
        $group->fill($request->all())->save();
        return $this->success('添加套餐组成功');
    }


    public function show(Group $group)
    {
        return $this->json($group);
    }

    public function update(Request $request, Group $group)
    {
        $group->name = $request->input('name');
        $group->save();
        return $this->success('修改套餐组成功');
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return $this->success('删除套餐组成功');
    }
}
