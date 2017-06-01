<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()->USRTYPE != 'user'){
            $message = 'Permis denegat: Nomes els usuaris poden entrar en aquesta secció. Tu ets un administrador, Troles!';
            return redirect()->route('home')->with('message', $message);
        }

        return view('user.home');
    }
}
