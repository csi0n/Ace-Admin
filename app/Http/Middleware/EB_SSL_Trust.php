<?php

namespace App\Http\Middleware;

use Closure;

class EB_SSL_Trust
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
        $request->setTrustedProxies([$request->getClientIp()]);
        return $next($request);
    }
}
