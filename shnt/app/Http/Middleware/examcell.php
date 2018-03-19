<?php

namespace App\Http\Middleware;

use Closure;

class examcell
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
        if(session()->get('type') != 'examcell') {
            if(url()->current() != route('dashboard'))
                return redirect()->route('dashboard');
        }   

        return $next($request);
    }
}
