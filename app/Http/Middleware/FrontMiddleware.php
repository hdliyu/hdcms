<?php

namespace App\Http\Middleware;

use App\Models\Site;
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
        $site = Site::where('domain', $info['host'])->where('https',$https)->firstOrFail();
        site($site);
        module($site->module->name);
    }
}
