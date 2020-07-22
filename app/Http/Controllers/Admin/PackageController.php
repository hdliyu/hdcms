<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Models\Package;
use App\Services\ModuleService;
use Illuminate\Support\Facades\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('package.index',compact('packages'));
    }

    public function create(Request $request,ModuleService $moduleService)
    {
        return view('package.create',['modules'=>$moduleService->allInstall()->values()]);
    }

    public function store(PackageRequest $request)
    {
        $package = Package::create($request->input());
        $package->module()->sync($request->input('modules'));
        return redirect()->route('admin.package.index')->with('success','套餐添加成功');
    }

    public function edit(Package $package,ModuleService $moduleService)
    {
        return view('package.edit',['package'=>$package,'modules'=>$moduleService->allInstall()->values()]);
    }
    public function show(Package $package)
    {
    }

    public function update(PackageRequest $request, Package $package)
    {
        $package->fill($request->input())->save();
        $package->module()->sync($request->input('modules'));
        return redirect()->route('admin.package.index')->with('success','套餐修改成功');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return response()->json(['message'=>'删除成功']);
    }
}
