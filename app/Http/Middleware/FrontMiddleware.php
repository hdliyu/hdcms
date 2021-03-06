<?php

namespace App\Http\Middleware;

use App\Models\Site;
use App\Services\ConfigService;
use Closure;

class FrontMiddleware
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
        $this->init();
        return $next($request);
    }

    public function init()
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
    }
}
