<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function store(Request $request,Group $group)
    {

    }


    public function show(Group $group)
    {
    }

    public function update(Request $request, Group $group)
    {

    }

    public function destroy(Group $group)
    {

    }
}
