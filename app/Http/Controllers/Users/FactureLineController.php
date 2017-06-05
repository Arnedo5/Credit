<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Requets;
use App\Http\Controllers\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;

class FactureLineController extends Controller
{
    public function __construct() 
    {
        if(!\Session::has('message')) \Session::put('message',array());
        if(!\Session::has('status')) \Session::put('status',array());
    }

    public function index()
    {
        if (auth()->user()->USRTYPE != 'user'){
            $message = 'Permis denegat: Nomes els usuaris poden entrar en aquesta secció. Tu ets un administrador, Troles!';
            return redirect()->route('home')->with('message', $message);
        }

        //Orders user
        $orders = DB::table('orders')
            ->select('ORDNUM')
            ->where('ORDIDUSER', \Auth::user()->USRID)
            ->get();


        $facture_lines = '';
        foreach($orders as $order){
            $facture_lines .= DB::table('facture_lines')
            ->where('FCLNUM', $order->ORDNUM)
            ->get();
        }

        dd($facture_lines->FCLID);

        //Products
        $products = DB::table('products')
            ->get();

        //Redirect
        return view('admin.order.facture.index',compact('facture_lines','products'));
    }
}
