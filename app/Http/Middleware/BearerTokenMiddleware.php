<?php

namespace App\Http\Middleware;

use Closure;

class BearerTokenMiddleware
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
        if($request->header('Authorization')){
            return $next($request);
        }
        return response()->json([
            'message' => 'You are not authorized',
        ]);
    }
}
