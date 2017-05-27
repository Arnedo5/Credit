<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;


class AdminController extends Controller
{
    public function __construct() 
    {
        if(!\Session::has('message')) \Session::put('message',array());
    }

    public function index() 
    {
        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        //Products
        $productActive = $this->productActive();
        $productInactive = $this->productInactive();

        //Comandes
        $orderActive = $this->orderActive();
        $orderInactive = $this->orderInactive();

        //Tickets
        $openTickets = $this->openTickets();
        $closeTickets = $this->closeTickets();

        //Users
        $usersActive = $this->usersActive();
        $usersInactive = $this->usersInactive();

        $cart = \Session::get('cart');

        return view('admin.home',compact(
            'cart',
            'productActive',
            'productInactive',
            'orderActive',
            'orderInactive',
            'openTickets',
            'closeTickets',
            'usersActive',
            'usersInactive'
        ));
    }

    //Products
    private function productActive () {
        $productActive = DB::table('products')
            ->where('PRDSTATUS', true)
            ->get();

        return $productActive;
    }

    private function productInactive () {
        $productInactive = DB::table('products')
            ->where('PRDSTATUS', false)
            ->get();

        return $productInactive;
    }

    //Orders
    private function orderActive () {
        $orderActive = DB::table('orders')
            ->where('ORDSTATUS', true)
            ->get();

        return $orderActive;
    }

    private function orderInactive () {
        $orderInactive = DB::table('orders')
            ->where('ORDSTATUS', false)
            ->get();

        return $orderInactive;
    }

    //Tickets
    private function openTickets () {
        $openTickets = DB::table('tickets')
            ->where('TICSTATUS', true)
            ->get();

        return $openTickets;
    }

    private function closeTickets () {
        $closeTickets = DB::table('tickets')
            ->where('TICSTATUS', false)
            ->get();

        return $closeTickets;
    }

    //Usuaris
    private function usersActive () {
        $usersActive = DB::table('users')
            ->where('USRSTATUS', true)
            ->get();

        return $usersActive;
    }

    private function usersInactive () {
        $usersInactive = DB::table('users')
            ->where('USRSTATUS', false)
            ->get();

        return $usersInactive;
    }
}
