<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //MODIFICACIONES AL REDIRECCIONAMIENTO
        if (Auth::guard($guard)->check() && Auth::user()->role->id == 1 ) {

            return redirect()->route('admin.dashboard');
            // return redirect('/home');
        }elseif(Auth::guard($guard)->check() && Auth::user()->role->id == 2){
            return redirect()->route('autor.dashboard');

        }else{
            return $next($request);
        }

        
    }
}
