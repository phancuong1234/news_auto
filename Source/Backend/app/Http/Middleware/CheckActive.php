<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckActive
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
        if(Auth::check())
        {
            if (Auth::user()->active == config('setting.is_active.active'))
            {
                return $next($request);    
            } else {
                Auth::logout();
                return redirect()->route('login.index')->with('alert',trans('messages.login.lock-user'));
            }
        }
        else {
            return $next($request); 
        }
    }
}
