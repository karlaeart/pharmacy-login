<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BearerTokenMiddleware
{
    /**
     * Handle authorization of incoming requests
     *
     * @param  Request  $request
     * @param Closure $next
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
