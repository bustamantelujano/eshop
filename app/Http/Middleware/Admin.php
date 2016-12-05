<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     if ( Auth::user()->isAdmin() )
    //     {

    //         return view('home');

    //     }else{

    //         return redirect ('/home');

    //     }
    // }
    public function handle($request, Closure $next){
        if ( !Auth::user()->isAdmin() ){
            return redirect('401');
        }
        else{
            return $next($request);
        }
    }

}