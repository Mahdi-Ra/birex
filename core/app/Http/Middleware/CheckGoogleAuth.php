<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

use Auth;
class CheckGoogleAuth
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
        if(Auth::user()->tauth == 1)
        {
            return $next($request);
        }else{

            return redirect()->route('two.factor.index');
        }

    }
}
