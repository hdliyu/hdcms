<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Account\Controller;
use App\Http\Requests\SiteRequest;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(Site::class, 'site');
    }

    public function index()
    {
//        $sites = user()->isSuperAdmin ? Site::all() : user()->allSites;
//
//        return view('site.index', compact('sites'));
    }

    public function create(Site $site)
    {
        return view('site.create', compact('site'));
    }

    public function store(SiteRequest $request, Site $site)
    {
        $site->fill($request->input());
        $site->user_id = auth()->id();
        $site->config = [];
        $site->save();
        return redirect()->route('admin')->with('success', '站点添加成功');
    }

    public function edit(Site $site)
    {
        return view('site.edit', compact('site'));
    }

    public function update(Request $request, Site $site)
    {
        $site->fill($request->input())->save();

        return redirect()->route('admin')->with('success', '站点修改成功');
    }

    public function destroy(Site $site)
    {
        $site->delete();
        return response()->json(['message' => '站点删除成功']);
    }
}
