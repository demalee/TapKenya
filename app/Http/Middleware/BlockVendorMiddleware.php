<?php
namespace App\Http\Middleware;
use Closure;
use Session;
use Illuminate\Support\Facades\Auth;
class BlockVendorMiddleware
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
        $response = $next($request);
        //If the vendor is blocked redirect to login start
        if(Auth::check() && Auth::user()->user_type==2 && Auth::user()->vendor_status==2){ // 2 for block
            Auth::logout();
            Session::flash('alert-class','alert-danger');
            Session::flash('message', "You are currentlly blocked!");
            //return redirect()->back();
            return redirect('/login');
        }
        //If the vendor is blocked redirect to login end
        return $response;
    }
}