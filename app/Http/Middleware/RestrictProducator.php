<?php

namespace App\Http\Middleware;

use Closure;

class RestrictProducator
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
        if ($request->user()->producator) {
            return redirect()->route('cont.arata.producator');
        }
        return $next($request);
    }
}
