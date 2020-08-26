<?php

namespace App\Http\Middleware;

use App\Models\Config;
use App\Services\ConfigService;
use App\Services\PermissionService;
use Closure;
use function config;
use function site;

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
        config(['admin'=>Config::first()->config]);
        app(ConfigService::class)->loadCurrentModuleConfig();
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
