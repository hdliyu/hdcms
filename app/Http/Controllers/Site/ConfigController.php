<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;
use function compact;

class ConfigController extends Controller
{
    public function edit(Site $site)
    {
        return view('site_config.edit',compact('site'));
    }

    public function update(Request $request,Site $site)
    {
        $site->config = $request->input();
        $site->save();
        return back();
    }
}
