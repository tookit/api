<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
class CORSMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->isMethod('OPTIONS')) {
            $response = new Response("", 200);
        }else {
            $response = $next($request);
        }
//        $response = $next($request);
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
//        $response->header('Access-Control-Allow-Credentials', 'true');
        return $response;
    }

}