<?php

namespace App\Http\Middleware;

use Closure;


use Illuminate\Support\Facades\Auth;

class VerificationOTP
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
        $otp = \Ichtrojan\Otp\Models\Otp::where('identifier', Auth::user()->email)->latest()->first();

        if(is_null($otp) || $otp->valid !== 0) {    
            return redirect()->route('verify');
        }
        return $next($request);

    }
}
