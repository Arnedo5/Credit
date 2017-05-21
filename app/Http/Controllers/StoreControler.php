<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Product;

class StoreControler extends Controller
{
    public function index ()
    {
        //$products = Product::all();
        $products = DB::table('products')->where('PRDSTATUS', true)->get();

        return view('store.index',compact('products'));
      
    }
}
