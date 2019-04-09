<?php

namespace App\Http\Middleware;

use Closure;

class RestrictCompanie
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
        if ($request->user()->producator->companie) {
            return redirect()->route('cont.arata.companie');
        }
        return $next($request);
    }
}
