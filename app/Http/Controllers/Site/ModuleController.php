<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class ModuleController extends Controller
{

    public function index(Site $site)
    {
        return view('site_module.index',compact('site'));
    }

    public function entry(Site $site, $moduleName)
    {
        site($site);            //缓存当前要操作的站点
        module($moduleName);    //缓存当前要操作的模块
        return redirect($moduleName . '/admin');
    }

}
