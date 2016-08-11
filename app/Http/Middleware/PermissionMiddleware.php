<?php

namespace App\Http\Middleware;

use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  String $roles
     * @return mixed
     */
    public function handle($request, Closure $next,$permission)
    {
        if ( !$request->user()->hasPermission($permission)) {
            abort(403);
        }
        return $next($request);
    }
}
