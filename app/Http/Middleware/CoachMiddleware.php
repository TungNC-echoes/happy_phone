<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CoachMiddleware
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
        if (Auth::check()) {
            if ((Auth::user()->level == 2)) {
                return $next($request);
            } elseif ((Auth::user()->level == 1)) {
                return redirect('/admin');
            } else {
                return redirect('/member');
            }
        }
        return redirect('/');
    }
}
