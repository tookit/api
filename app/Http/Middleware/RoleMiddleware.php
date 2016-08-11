<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  String $roles
     * @return mixed
     */
    public function handle($request, Closure $next,$roles)
    {
        if ( !$request->user()->hasRole(explode('|', $roles))) {
            abort(403);
        }
        return $next($request);
    }
}
