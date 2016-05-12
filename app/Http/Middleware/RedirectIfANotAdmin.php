<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\UserController;

class RedirectIfANotAdmin
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

        if($request->user()->permition!=1){
           return redirect('user');
        }
        return $next($request);
    }
}
