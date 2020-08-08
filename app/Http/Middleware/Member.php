<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Arr;
use Route;
use Closure;

class Member extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     protected $guards;
    public function handle($request, Closure $next)
    {
        if(Auth::guard('member')->check()){
            return  $next($request);
        }
        return redirect('member/login');
    }
   
    
}
