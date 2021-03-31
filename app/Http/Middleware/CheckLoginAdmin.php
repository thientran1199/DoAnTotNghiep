<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('account_admin')->check()){
            $account_admin = Auth::guard('account_admin')->user();
            if($account_admin->role='admin'){
                return $next($request);
            }
            else{
                Auth::guard('account_admin')->logout();
                return redirect(url('/admin-page/login'));
            }
        }
        else return redirect(url('/admin-page/login'));
        
    }
}
