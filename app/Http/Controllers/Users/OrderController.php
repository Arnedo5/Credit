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
use App\OrderCategory;
use App\OrderStep;
use App\Order;
use App\User;

class OrderController extends Controller
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

        $order = DB::table('orders')
            ->where('ORDIDUSER', \Auth::user()->USRID)
            ->get();

        $orderCategories = OrderCategory::all();
        $orderSteps = orderStep::all();
        $users = User::all();

         //Redirect
        return view('user.order.index',compact('order','users','orderCategories','orderSteps')); 
    }

    public function edit($order)
    {

        if (auth()->user()->USRTYPE != 'user'){
            $message = 'Permis denegat: Nomes els usuaris poden entrar en aquesta secció. Tu ets un administrador, Troles!';
            return redirect()->route('home')->with('message', $message);
        }

        
        //Facture lines
        $facture_lines =  DB::table('facture_lines')
            ->where('FCLNUM', $order)
            ->get();
        
        //Products
        $products = DB::table('products')
            ->get();

        return view('user.order.factureLine',compact('order','facture_lines','products'));
    }
}
