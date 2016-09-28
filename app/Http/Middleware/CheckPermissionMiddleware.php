<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (auth()->user()->can($permission))
            return $next($request);
        return response()->json([
            'code' => 500,
            'msg' => trans('alerts.noPermissions')
        ]);
    }
}
