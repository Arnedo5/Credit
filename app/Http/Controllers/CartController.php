<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;

class CartController extends Controller
{
    public function __construct() 
    {
        if(!\Session::has('cart')) \Session::put('cart',array());
    }

    //Show Cart
    public function show() 
    {
        $categories = DB::table('product_categories')
            ->where('PRCSTATUS', true)
            ->get();

        $total = $this->total();
        $cart = \Session::get('cart');

        return view('store.cart',compact('cart','categories','total'));
    }

    //Add item
    public function add(Product $product)
    {
        $cart = \Session::get('cart');
        $product->quantity = 1;
        $cart[$product->PRDNUM] = $product;

        \Session::put('cart',$cart);

        return redirect()->route('cart-show');
    }

    // Delete item
    public function delete (Product $product)
    {
        $cart = \Session::get('cart');
        unset($cart[$product->PRDNUM]);
        \Session::put('cart',$cart);

        return redirect()->route('cart-show');
    }

    // Update item
     public function update (Product $product, $quantity)
    {
        
        $cart = \Session::get('cart');
        $cart[$product->PRDNUM]->quantity = $quantity;
        \Session::put('cart',$cart);

        return redirect()->route('cart-show');
        
    }

    // Trash cart (Delete)
    public function trash ()
    {
        \Session::forget('cart');

        return redirect()->route('cart-show');
    }

    // Total 
    private function total ()
    {
        $cart = \Session::get('cart');
        $total = 0;
        foreach ($cart as $item) {
            $total += $item->PRDPRICE * $item->quantity;
        }

        return $total;
    }

    //Order Detail
    public function orderDetail()
    {
        $categories = DB::table('product_categories')
            ->where('PRCSTATUS', true)
            ->get();

        if(count(\Session::get('cart')) <= 0) return redirect()->route('home');
        $cart = \Session::get('cart');
        $total = $this->total();

        return view('store.order-detail',compact('cart','categories','total'));
       
    }
}
