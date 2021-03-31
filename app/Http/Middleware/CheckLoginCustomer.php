<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class CheckLoginCustomer
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
        if(Auth::guard('account_customer')->check()){
            $account_customer = Auth::guard('account_customer')->user();
            if($account_customer->role='customer'){
                return $next($request);
            }
            else{
                Auth::guard('account_customer')->logout();
                return redirect(url('/login'));
            }
        }
        else return redirect(url('/login'));
    }
}
