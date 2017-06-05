<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requets;
use App\Http\Controllers\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\OrderCategory;
use App\OrderStep;
use App\Order;
use App\User;

class TrackingController extends Controller
{
    public function __construct() 
    {
        if(!\Session::has('message')) \Session::put('message',array());
        if(!\Session::has('status')) \Session::put('status',array());
    }

    public function index() 
    {   
        return view('tracking.index',compact('status'));
    }

    public function store(Request $request)
    {
       
        $order = DB::table('orders')
            ->where('ORDNUM',$request->ORDNUM)
            ->get();

        if ($order->isEmpty()) {
            $message = "No s'ha trobat el numero de seguiment $request->ORDNUM!";
            return redirect()->route('tracking.index')->with('message', $message);
        } else {
            $orderCategories = OrderCategory::all();
            $orderSteps = orderStep::all();
            $users = User::all();

        
            return view('tracking.show',compact('order','users','orderCategories','orderSteps'));   
        }
    }

    
}
