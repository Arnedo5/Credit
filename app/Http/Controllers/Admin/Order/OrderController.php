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
         if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }
        
        $order = Order::all();
        $orderCategories = OrderCategory::all();
        $orderSteps = orderStep::all();
        $users = User::all();

        return view('admin.order.index',compact('order','users','orderCategories','orderSteps'));   
    }


    public function update(Order $order){
        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        // Next step
        $step =  DB::table('order_steps')
            ->where('ORSID', $order->ORDIDSTEP)
            ->first();

        $stepId = DB::table('order_steps')
            ->select('ORSID')
             ->where([
                    ['ORSNUM', '=', $order->ORDIDCATEGORY],
                    ['ORSSTEP', '=', $step->ORSSTEP+1],
                ])
            ->pluck('ORSID')
            ->first();

       
        // Total steps
        $totalStep = DB::table('order_steps')
            ->where('ORSNUM', $order->ORDIDCATEGORY)
            ->count();

        if($stepId) {
            $update = DB::table('orders')
            ->where('ORDID', $order->ORDID)
            ->update(
                ['ORDIDSTEP' =>  $stepId]);
        } else {
            $update = DB::table('orders')
                    ->where('ORDID', $order->ORDID)
                    ->update(
                        ['ORDSTATUS' =>  0]);
            $update = null;
        }

        $status = $update ? "Tracking canviat correctament." :  "Maxim canvis d'estat arribat!";

        return redirect()->route('order.index')->with('status', $status);  
    }
}


