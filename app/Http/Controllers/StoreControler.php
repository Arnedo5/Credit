<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;

class StoreControler extends Controller
{
    public function __construct() 
    {
        if(!\Session::has('cart')) \Session::put('cart',array());
    }

    public function index ()
    {
        $cart = \Session::get('cart');

        $categories = DB::table('product_categories')
            ->where('PRCSTATUS', true)
            ->get();
        $products = DB::table('products')
            ->where('PRDSTATUS', true)
            ->get();

        /* Active user */
        if (auth()->check()) {
            if (auth()->user()->USRSTATUS != true){
                $message = 'Usuari inactiu. Contacta amb un administrador de sistema.';
                return redirect()->route('logout')->with('message', $message);
            } 
        }

        return view('store.index',compact('products','categories','cart'));
      
    }

    public function show($PRDNUM) 
    {
        $cart = \Session::get('cart');
        $categories = DB::table('product_categories')
            ->where('PRCSTATUS', true)
            ->get();
        $product = DB::table('products')
            ->where('PRDNUM',$PRDNUM)
            ->first();
        
        return view('store.show',compact('product','categories','cart'));
    }

    public function category($PRCNAME) 
    {
        $cart = \Session::get('cart');
        $categories = DB::table('product_categories')
        ->where('PRCSTATUS', true)
        ->get();

        $id = DB::table('product_categories')
            ->select('PRCID')
            ->where([
                ['PRCNAME', '=', $PRCNAME],
                ['PRCSTATUS', '=', true]
            ])
            ->get()
            ->pluck('PRCID')
            ->first();


        $img = DB::table('product_categories')
            ->select('PRCIMG')
            ->where([
                ['PRCID', '=', $id],
                ['PRCSTATUS', '=', true]
            ])
            ->get()
            ->pluck('PRCIMG')
            ->first();

        $products = DB::table('products')
            ->where([
                ['PRDIDCATEGORY', '=', $id],
                ['PRDSTATUS', '=', true]
            ])
            ->get();

        return view('store.category',compact('products','categories','PRCNAME','img','cart'));
    }
}
