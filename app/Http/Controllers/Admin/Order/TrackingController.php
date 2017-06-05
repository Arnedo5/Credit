<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Requets;
use App\Http\Controllers\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;

class TrackingController extends Controller
{
    public function __construct() 
    {
        if(!\Session::has('message')) \Session::put('message',array());
        if(!\Session::has('status')) \Session::put('status',array());
    }

    public function index()
    {

        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        //Order steps - products
        $order_steps = DB::table('order_steps')
            ->get();

        //Order categories - products
        $order_categories = DB::table('order_categories')
            ->get();
        
        //Redirect
        return view('admin.order.tracking.index',compact('order_steps','order_categories'));
    }
}
