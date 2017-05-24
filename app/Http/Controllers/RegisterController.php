<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validation($request);
        User::create($request);
        return redirect('/');
    }

    public function validation($request) 
    {
        return $this->validate($request, [
            'USRNAME' => 'required|string|max:255',
            'USRMAIL' => 'required|string|email|max:255|unique:users',
            'USRNAME' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        
    }
}
