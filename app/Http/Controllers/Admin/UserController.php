<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Requets;
use App\Http\Controllers\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;
use App\User;

class UserController extends Controller
{
     public function __construct() 
    {
        if(!\Session::has('message')) \Session::put('message',array());
        if(!\Session::has('status')) \Session::put('status',array());
    }

    //Show index in table
    public function index()
    {
        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        $users = User::all();
        
        return view('admin.user.index',compact('users','categories'));
    }

    //Form new user
    public function create() 
    {
        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        return view('admin.user.create');
    }
    

    //Create new user
    public function store(Request $request)
    {

        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        $this->validate($request, [
            'USRLOGIN' => 'required|string|max:50|unique:users',
            'USRMAIL' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'USRNAME' => 'required|string|max:50',
            'USRLASTNAME' => 'required|string|max:350',
            'USRCITY' => 'required|string|max:350',
            'USRDIRECTION' => 'required|string|max:50',
            'USRIMG' => 'image|mimes:jpeg,png,bmp,gif,svg',
        ]);

        //Search all products
        $user = DB::table('users')
            ->count();
        $user++;

        $urlImage = $this->uploadImg($request, $user);

        /* Crete user */
        $User = User::create([
            'USRNUM' => $user,
            'USRTYPE' => 'user',
            'USRLOGIN' => $request->get('USRLOGIN'),
            'USRNAME' => $request->get('USRNAME'),
            'USRLASTNAME' => $request->get('USRLASTNAME'),
            'USRMAIL' => $request->get('USRMAIL'),
            'USRPASSWORD' => bcrypt($request->get('password')) ,
            'USRCITY' => $request->get('USRCITY'),
            'USRDIRECTION' => $request->get('USRDIRECTION'),
            'USRPOSTAL' => $request->get('USRPOSTAL'),
            'USRMOBILE' =>  $request->get('USRMOBILE'),
            'USRDESCRIPTION' => 'Usuari estàndard',
            'USRIMG' => $urlImage,
            'USRSTATUS' => true,
        ]);

        $status = $User ? 'Usuari creat correctament' : "L'usuari no s'ha pogut crear. Comprova les dades";

        return redirect()->route('user.index')->with('status', $status);
    }

    /* Edit form */
    public function edit(User $user)
    {
        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        return view('admin.user.edit',compact('user'));
    }

    /* Update user */
    public function update(Request $request,User $user)
    {
        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }


        $this->validate($request, [
            'USRNAME' => 'required|string|max:50',
            'USRLASTNAME' => 'required|string|max:350',
            'USRCITY' => 'required|string|max:350',
            'USRDIRECTION' => 'required|string|max:50',
            'USRIMG' => 'image|mimes:jpeg,png,bmp,gif,svg',
        ]);
        
        //User - image
        if($request->USRIMG) {
             $user = $user->USRNUM;
             $urlImage = $this->uploadImg($request, $user);
        } else {
            $urlImage = $user->USRIMG;
        }

        //User password
        if($request->USRPASSWORD) {
             $password = $request->USRPASSWORD;
        } else {
            $password = $user->USRPASSWORD;
        }

        $update = DB::table('users')
            ->where('USRID', $user->USRID)
            ->update(
                ['USRLOGIN' =>  $request->USRLOGIN,
                'USRMAIL' =>  $request->USRMAIL,
                'USRPASSWORD' =>  $password,
                'USRTYPE' =>  $request->USRTYPE,
                'USRSTATUS' =>  $request->USRSTATUS,
                'USRIMG' =>  $urlImage,
                'USRNAME' =>  $request->USRNAME,
                'USRLASTNAME' =>  $request->USRLASTNAME,
                'USRCITY' =>  $request->USRCITY,
                'USRDIRECTION' =>  $request->USRDIRECTION,
                'USRMOBILE' =>  $request->USRMOBILE,
                'USRPOSTAL' =>  $request->USRPOSTAL,
                ]);
        
        $status = $update ? 'Usuar modificat correctament' : "L'usuari no s'ha pogut modificar, o no hi havien dades pera a modificar. Comprova les dades";

        return redirect()->route('user.index')->with('status', $status);

    }

    /* Remove user */
    public function destroy(User $user)
    {
        
        if (auth()->user()->USRTYPE != 'admin'){
            $message = 'Permis denegat: Nomes els administradors poden entrar en aquesta secció';
            return redirect()->route('home')->with('message', $message);
        }

        //$deleted = $category->delete();
        $deleted = DB::table('users')
            ->where('USRID', $user->USRID)
            ->delete();

         $status = $deleted ? 'Usuar eliminat correctament.' : "L'usuari no s'ha pogut eliminar";
        
        return redirect()->route('user.index')->with('status', $status);
        
    }

    /* Upload img */
    private function uploadImg(Request $request, $user)
    {
        
        //Upload image
        if($request->hasFile('USRIMG')) {
			$avatar = $request->file('USRIMG');

            if (str_contains($request->USRIMG->getClientOriginalName(), ['','jpg','PNG','jpeg', 'png','bmp','gif','svg'])) {
				$filename = 'profile'.$user.'.png';
                Image::make($avatar)->resize(300, 300)->save( public_path('img/profileImage/' . $filename ) );
                /* For resize img - add
                    ->resize(800, 800)
                */
			}
        }

        return 'img/profileImage/profile'.$user.'.png';
    }
}
