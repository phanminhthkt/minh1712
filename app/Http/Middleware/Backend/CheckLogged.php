<?php

namespace App\Http\Middleware\Backend;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckLogged
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
        if(Auth::check()){
            return redirect()->route('Backend.Dashboard');
        }else{
            return $next($request);
        }
    }
}
