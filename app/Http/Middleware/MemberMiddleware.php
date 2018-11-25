<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MemberMiddleware
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
            if ((Auth::user()->level == 3)) {
                return $next($request);
            } elseif ((Auth::user()->level == 1)) {
                return redirect('/admin');
            } elseif ((Auth::user()->level == 2)) {
                return redirect('/coach');
            }
        }
        return redirect('/');
    }
}
