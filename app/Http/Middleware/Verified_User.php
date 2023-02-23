<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
class Verified_User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->verified==0){
            \Auth::logout();
            Session::flash('message', 'Account not Verified - Please wait 3-4 days');
            return redirect('/login')->withWarning( 'Account not Verified' );
        }
        else if(Auth::user()->verified==2){
            \Auth::logout();
            Session::flash('danger', 'Account verification denied - Account has permenantly been shut');
            return redirect('/login')->withWarning( 'Account verification denied - Account has permenantly been shut' );
        }
        return $next($request);
    }
}
