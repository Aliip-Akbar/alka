<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CekUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $rules)
    {

        if (Auth::check() && Auth::user()->level == 1){
            return $next($request);
        }elseif (Auth::check() && Auth::user()->level == 2){
            return $next($request);
        }elseif (Auth::check() && Auth::user()->level == 3){
            return $next($request);
        }
        abort(403);
        // if (!Auth::check()) {
        //     return redirect('login');
        // }
        // $user = Auth::user();
        // if ($user->level == $rules) {
        // return $next($request);

        // return redirect('login')->with('Tidak Ada akses');
        // }
    }
}
