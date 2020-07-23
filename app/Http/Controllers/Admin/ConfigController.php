<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

    public function edit(Config $config)
    {
        $config = Config::first()->config;
        return view('config.edit',compact('config'));
    }

    public function update(Request $request, Config $config)
    {
       $config->fill($request->input())->save();
       return redirect()->route('admin.config.edit')->with('message','更新成功');
    }


}
