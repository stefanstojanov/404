<?php

namespace App\Http\Middleware;

use Closure;

class Maticen
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
        if(!auth()->user()->isMaticen())
            return redirect('/home');

        return $next($request);
    }
}
