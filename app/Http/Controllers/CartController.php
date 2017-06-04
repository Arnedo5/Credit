<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\ProductCategory;
use App\FactureLine;

class CartController extends Controller
{
    public function __construct() 
    {
        if(!\Session::has('cart')) \Session::put('cart',array());
        if(!\Session::has('status')) \Session::put('status',array());
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

    public function store(Request $request)
    {
        //Check radio button
        $this->validate($request, [
            'track' => 'required',
        ]);

        //dd($request->track);
        $category = $request->track === 'store' ? 2 : 1;

        //Count
        $num = DB::table('counts')
            ->select('CNTNUM')
            ->where('CNTCATEGORY', 'tracking')
            ->get()
            ->pluck('CNTNUM')
            ->first();

        // Id
        $id =  DB::table('orders')->count();
        $id++;

        //Subtotal
        $cart = \Session::get('cart');
        $total = 0;

        foreach ($cart as $item) {
            $total += $item->PRDPRICE * $item->quantity;
        }

        /* Step */
        $step = DB::table('order_steps')
            ->select('ORSID')
            ->where('ORSNUM', $category)
            ->where([
                    ['ORSNUM', '=', $category],
                    ['ORSSTEP', '=', 1],
                ])
            ->pluck('ORSID')
            ->first();
               

        /* Create order */
        $order = Order::create([
            'ORDID' => $id,
            'ORDNUM' => $num,
            'ORDIDUSER' => \Auth::user()->USRID,
            'ORDSUBTOTAL' => $total,
            'ORDIDSTEP' => $step,
            'ORDIDCATEGORY' => $category,
            'ORDIDREPARE' => 1,
            'ORDSTATUS' => 1,
        ]);

        /* Create facture lines */
        foreach ($cart as $item) {
            $this->saveOrderItem($item, $num, $id);
        }


        /* Update count */
        $update = DB::table('counts')
            ->where('CNTID', 1)
            ->update(
                ['CNTNUM' =>  $num + 1]);
        

        /* Clean cart and Redirect home */
        \Session::forget('cart');
        if ($order) {
            $status = "Comanda numero: ".$num." creada correctament. Comprovi el seu perfil per veure els detalls.";
        } else {
            $status = "No s'ha pogut crear la comanda, revisi la seva cistella";
        }
       
        return redirect()->route('home')->with('status', $status); 
   
    }
    private function saveOrderItem($item, $order_num, $order_id)
	{
		FactureLine::create([
			'FCLNUM' => $order_num,
			'FCLPRICE' => $item->PRDPRICE,
			'FCLQUANTITY' => $item->quantity,
			'FCLIDPRODUCT' => $item->PRDID,
            'FCLIDORDER' => $order_id
		]);
	}
}
