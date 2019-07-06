<?php

namespace App\Http\Middleware;

use Closure;

class blocked
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
        if(auth()->user()->is_blocked!=1){
            return abort(401);
        }
        return $next($request);
    }
}
