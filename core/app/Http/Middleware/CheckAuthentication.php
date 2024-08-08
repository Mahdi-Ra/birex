<?php

namespace App\Http\Middleware;


use Closure;
use App\User;

use Auth;
class CheckAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->passport_image_state == 1 && Auth::user()->selfi_request_state == 1 && Auth::user()->selfie_image_state == 1) {
            return $next($request);
        } else {

            return redirect()->route('user.auth_for_use');
        }
    }
}
