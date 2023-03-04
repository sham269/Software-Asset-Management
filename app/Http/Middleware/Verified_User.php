<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
Use App\Models\User;
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
        $msg;
        if(Auth::user()->verified==0){
            \Auth::logout();
            Session::flash('message', 'Account not Verified - Please wait 3-4 days');
            return redirect('/login')->withWarning( 'Account not Verified' );
        }
        else if(Auth::user()->verified==2){
            $notes =Auth::user()->notes;
            Auth::logout();
           
            $msg="123";
            Session::flash("danger", "Account verification denied - Account has permenantly been shut wdqefeq");
            // Session::flash('danger', "Account verification denied - Account has permenantly been shut {$user->notes}");
             return redirect('/login')->withWarning( "Account verification denied - Account has permenantly been shut $notes")->with("danger", "Account verification denied - Account has permenantly been shut [Reason: $notes]");
        }  
        return $next($request);
    }
}
