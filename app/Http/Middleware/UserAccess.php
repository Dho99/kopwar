<?php
   
namespace App\Http\Middleware;
   
use Closure;
use Illuminate\Http\Request;
   
class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $level)
    {
        if(auth()->user()->level === $level){
            return $next($request);
        }

        return response()->view('errors.404');
    }
}