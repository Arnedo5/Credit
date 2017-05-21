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
        $categories = DB::table('product_categories')->where('PRCSTATUS', true)->get();
        $products = DB::table('products')->where('PRDSTATUS', true)->get();
        return view('store.index',compact('products','categories'));
      
    }

    public function show($PRDNUM) 
    {
        $categories = DB::table('product_categories')->where('PRCSTATUS', true)->get();
        $product = DB::table('products')->where('PRDNUM',$PRDNUM)->first();
         return view('store.show',compact('product','categories'));
    }
}
