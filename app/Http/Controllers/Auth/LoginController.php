<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

    class LoginController extends Controller
    {
        use AuthenticatesUsers;

        /**
         * Where to redirect users after login.
         *
         * @var string
         */
        protected $redirectTo = RouteServiceProvider::HOME;

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('guest')->except('logout');
        }

        /**
         * The user has been authenticated.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  mixed  $user
         * @return mixed
         */
        protected function authenticated(Request $request, $user)
        {
            // Check if the user has the "regular" role
            if ($user->role === 'regular') {
                return redirect($this->redirectTo);
            }

            $user->load('verifies');

            if (($user->role === 'company' || $user->role === 'supplier') && $user->verifies) {
                if ($user->verifies->verification_status == 1) {
                    return view('home');
                } else {
                    return view('verification.success'); // Redirect to the success view
                }
            } else {
                // Redirect to the verification popup route if verifies relationship is null
                return redirect()->route('verification.popup');
            }
    }
}
