<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class Techar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {      $destinations=[

        1=>'admin',
        3=>'volunteer',
        4=>RouteServiceProvider::HOME,
    ];
        if(!Auth::check()){
            return redirect()->route('login');
        }
        if(Auth::user()->role !=2){
            return  redirect()->route( $destinations[Auth::user()->role]);
        }
        return $next($request);
    }

}
