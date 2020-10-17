<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Closure;

class SystemMiddleware
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
        return $next($request);
    }
}
