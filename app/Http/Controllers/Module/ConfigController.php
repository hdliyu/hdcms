<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Account\Controller;
use App\Models\ModuleConfig;
use App\Services\ConfigService;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function edit()
    {
        return view('modules.config.edit');
    }

    public function update(Request $request, ConfigService $configService)
    {
        $configService->saveCurrentModuleConfig($request->input());
        return back()->with('success', '模块配置保存成功');
    }
}
