<?php

namespace App\Http\Middleware;

use App\Models\Site;
use App\Services\ConfigService;
use Closure;
use function app;

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
        app(ConfigService::class)->loadCurrentModuleConfig();
        return $next($request);
    }

    public function init()
    {
        $info = parse_url(request()->url());
        $https = $info['scheme'] == 'https';
        $site = Site::firstOrFail();
        site($site);
        module($site->module->name);
    }
}
