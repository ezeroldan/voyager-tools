<?php

namespace App\Http\Middleware;

use Closure;
use Debugbar;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class DevMiddleware
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

        if (App::environment('production')) {
            if (Auth::user() && auth()->user() && Auth::user()->role->name === 'DEV') {
                Debugbar::enable();
            } else {
                Debugbar::disable();
            }
        }

        return $next($request);
    }
}
