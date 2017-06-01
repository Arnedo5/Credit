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
use App\ProductCategory;

class CategoryController extends Controller
{
    public function __construct() 
    {
        if(!\Session::has('message')) \Session::put('message',array());
        if(!\Session::has('status')) \Session::put('status',array());
    }

    public function index() {

        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        //$categories =  DB::table('product_categories')->get();
        $categories = ProductCategory::all();

        //dd($categories);
        return view('admin.product.category.index',compact('categories'));
    }

    //View create product category
    public function create() {

        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        return view('admin.product.category.create');
    }

    public function store(Request $request)
    {

        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        $this->validate($request, [
          'PRCNAME' => 'required|unique:product_categories|max:50',
          'PRCDESCRIPTION' => 'max:350',
          'PRCIMG' => 'required|max:300',
          'PRCSTATUS' => 'required',
        ]);

        $countCategory = DB::table('product_categories')
            ->count();
        $countCategory++;

        $category = ProductCategory::create([
            'PRCNUM' => $countCategory,
            'PRCNAME' => $request->get('PRCNAME'),
            'PRCDESCRIPTION' => $request->get('PRCDESCRIPTION'),
            'PRCIMG' => $request->get('PRCIMG'),
            'PRCSTATUS' => $request->get('PRCSTATUS')
        ]);

        $status = $category ? 'Categoria afegida correctament' : "La categoria no s'ha pogut afegir. Comprova les dades";

        return redirect()->route('category.index')->with('status', $status);
    }

    public function show(ProductCategory $category)
    {
        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        return $category;
    }

    public function edit(ProductCategory $category)
    {
        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        return view('admin.product.category.edit',compact('category'));
    }

    public function update(Request $request,ProductCategory $category)
    {
        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        $this->validate($request, [
            'PRCNAME' => 'required|max:50',
            'PRCDESCRIPTION' => 'max:350',
            'PRCIMG' => 'required|max:300',
            'PRCSTATUS' => 'required',
        ]);

        $update = DB::table('product_categories')
            ->where('PRCID', $category->PRCID)
            ->update(
                ['PRCDESCRIPTION' =>  $request->PRCDESCRIPTION,
                'PRCNAME' =>  $request->PRCNAME,
                'PRCIMG' =>  $request->PRCIMG,
                'PRCSTATUS' =>  $request->PRCSTATUS
                ]);
        
        $status = $update ? 'Categoria modificada correctament' : "La categoria no s'ha pogut modificar. Comprova les dades";

        return redirect()->route('category.index')->with('status', $status);
        
    }

    public function destroy(ProductCategory $category)
    {
        
        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        //Search products in ctaegory
        $products = DB::table('products')
            ->where('PRDIDCATEGORY', $category->PRCID)
            ->get();

        if($products->count()) {
            $message = "No es pot eliminar una categoria que te productes associada a ella.";
        
            return redirect()->route('category.index')->with('message', $message);
        }

        //$deleted = $category->delete();
        $deleted = DB::table('product_categories')
            ->where('PRCID', $category->PRCID)
            ->delete();

         $status = $deleted ? 'Categoria eliminada correctament.' : "La categoria no s'ha podut eliminar";
        
        return redirect()->route('category.index')->with('status', $status);
    }
}
