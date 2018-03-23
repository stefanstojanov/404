<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class Administrator
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
        if(!auth()->user()->isAdministrator())
            return redirect('/home');

        return $next($request);
    }
}
