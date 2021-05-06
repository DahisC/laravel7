<?php

namespace App\Http\Middleware;

use Closure;

class CheckDatabase {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        dd('123123');
        return $next($request);
    }
}
