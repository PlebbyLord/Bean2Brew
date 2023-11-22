<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyUser
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
        // Check if the user is verified
        if ($request->user() && !$request->user()->verification->verification_status) {
            // Redirect to the verification popup if not verified
            return redirect()->route('verification.popup');
        }

        return $next($request);

        $user = Auth::user();

        if ($user && $user->verification_status !== null) {
            return $next($request);
        }

        return redirect()->route('verification.popup')->with('error', 'You need to verify your account.');
    }
        
}

