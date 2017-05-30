<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Requets;
use App\Http\Controllers\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;
use App\Product;
use App\ProductCategory;

class ProductController extends Controller
{
    public function __construct() 
    {
        if(!\Session::has('message')) \Session::put('message',array());
        if(!\Session::has('status')) \Session::put('status',array());
    }

    public function index()
    {
        $products = Product::all();
        
        $categories = $this->getCategories();

        return view('admin.product.index',compact('products','categories'));
    }

    public function create() 
    {
        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        $categories = ProductCategory::all();

        return view('admin.product.create',compact('categories'));
    }

    public function store(Request $request)
    {

        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        /*
        $this->validate($request, [
          'PRDIDCATEGORY' => 'required',
          'PRDNAME' => 'required|unique:product_categories|max:50',
          'PRDDESCRIPTION' => 'required|min:1|max:500',
          'PRDIMG' => 'required|max:300',
          'PRDSTOCK' => 'required|max:11',
          'PRDPRICE' => 'required|max:5',
          'PRDSTATUS' => 'required',
        ]);
        */
        $products = DB::table('products')
            ->count();
        $products++;

        //Upload image
        if($request->hasFile('PRDIMG')) {
			$avatar = $request->file('PRDIMG');

            if (str_contains($request->PRDIMG->getClientOriginalName(), ['jpg','PNG','jpeg', 'png','bmp','gif','svg'])) {
				$filename = 'product'.$products.'.png';
                Image::make($avatar)->save( public_path('/img/products/' . $filename ) );
                /* For resize img - add
                    ->resize(800, 800)
                */
			}
        }

        /* Url image for Mysql*/
        $products = DB::table('products')
            ->count();
        $products++;

        $urlImage = 'img/products/product'.$products.'.png';

        /* Num product */
        $countProduct = DB::table('products')
            ->count();
        $countProduct++;



        /* Crete product */
        $category = Product::create([
            'PRDNUM' => $countProduct,
            'PRDIDCATEGORY' => $request->get('PRDIDCATEGORY'),
            'PRDNAME' => $request->get('PRDNAME'),
            'PRDDESCRIPTION' => $request->get('PRDDESCRIPTION'),
            'PRDIMG' => $urlImage,
            'PRDSTOCK' => $request->get('PRDSTOCK'),
            'PRDPRICE' => $request->get('PRDPRICE'),
            'PRDSTATUS' => $request->get('PRDSTATUS')
        ]);

        $status = $category ? 'Producte afegit correctament.' : "El producte no s'ha pogut afegir. Comprova les dades";

        return redirect()->route('product.index')->with('status', $status);
    }

    private function getCategories()
    {
        return  ProductCategory::all();
    }

}
