<?php

namespace App\Http\Middleware;

use Closure;

class hod
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
        if(!\App\Staff::find(session()->get('username'))->hod) {
            if(url()->current() != route('dashboard'))
                return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
