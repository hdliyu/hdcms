<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Services\ModuleService;
use http\Env\Response;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(ModuleService $moduleService)
    {
        $modules = $moduleService->all();
        return view('module.index',compact('modules'));
    }

    public function install($name,ModuleService $moduleService)
    {
        $module = $moduleService->find($name);
        Module::create($module);
        return back()->with('success','模块安装成功');
    }

    public function uninstall(Module $module)
    {
        $module->delete();
        return response()->json(['message'=>'模块卸载成功']);
    }

}
