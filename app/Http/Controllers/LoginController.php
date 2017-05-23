<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate()
    {
        if (Auth::attempt(['USRMAIL' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('/home');
        }
    }
}
