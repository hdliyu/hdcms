<?php

namespace App\Http\Middleware;

use App\Models\Config;
use App\Models\Site;
use App\Services\ConfigService;
use App\Services\PermissionService;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $info = parse_url(request()->url());
        $https = $info['scheme'] == 'https';
        $site = Site::where('https',$https)->where('domain',$info['host'])->first();
        if($site){
            site($site); //缓存站点数据
            config(['site'=>$site['config']]); //加载站点配置到内存
            if($site->module){
                module($site->module->name);
                app(ConfigService::class)->loadCurrentModuleConfig();
            }
        }
        if (user()->isSuperAdmin || site()->user_id == user('id')) {
            return $next($request);
        }
        $status = app(PermissionService::class)->checkModuleAccess(site(), module()['name']);
        if ($status) {
            return $next($request);
        }
        return redirect()->route('site.site.index')->with('danger', '没有操作权限');
    }
}
