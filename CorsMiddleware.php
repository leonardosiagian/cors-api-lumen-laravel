<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     * 20200503
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Intercepts OPTIONS requests
        if ($request->isMethod('OPTIONS')) {
            $response = response('', 200);
        } else {
            // Pass the request to the next middleware
            $response = $next($request);
        }
        // Sends it
        return $response;
    }
}
