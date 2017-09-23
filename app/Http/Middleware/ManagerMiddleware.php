<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class ManagerMiddleware
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
        if (Sentinel::check() ){
            if(Sentinel::getUser()->roles()->first()->slug == 'manager' || Sentinel::getUser()->roles()->first()->slug == 'admin')
                return $next($request);
            else
                return rediredct('/');
        }
            
        else
            return redirect('/');
    }
}
