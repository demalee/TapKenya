<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
class SuperAdminMiddleware
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
        if($request->user()->id!='1')
        {
            Auth::logout();
            return redirect('/home');
        }
        return $next($request);
    }
}
