<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Requets;
use App\Http\Controllers\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use Image;

class EditController extends Controller
{
    public function __construct() 
    {
        if(!\Session::has('message')) \Session::put('message',array());
        if(!\Session::has('status')) \Session::put('status',array());
    }

    //Form new user
    public function edit($userID) 
    {
        if (auth()->user()->USRTYPE != 'user'){
            $message = 'Permis denegat: Nomes els usuaris poden entrar en aquesta secció. Tu ets un administrador, Troles!';
            return redirect()->route('home')->with('message', $message);
        }

        $user = DB::table('users')
            ->where('USRID', (int)$userID)
            ->first();


        return view('user.edit.edit',compact('user'));
    }

    /* Update user */
    public function update(Request $request, $userID)
    {

        $user = DB::table('users')
            ->where('USRID',(int)$userID)
            ->first();

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
                [
                'USRLOGIN' =>  $request->USRLOGIN,
                'USRMAIL' =>  $request->USRMAIL,
                'USRPASSWORD' =>  $password,
                'USRIMG' =>  $urlImage,
                'USRNAME' =>  $request->USRNAME,
                'USRLASTNAME' =>  $request->USRLASTNAME,
                'USRCITY' =>  $request->USRCITY,
                'USRDIRECTION' =>  $request->USRDIRECTION,
                'USRMOBILE' =>  $request->USRMOBILE,
                'USRPOSTAL' =>  $request->USRPOSTAL,
                ]);
        
        $status = $update ? 'Usuar modificat correctament' : "L'usuari no s'ha pogut modificar, o no hi havien dades pera a modificar. Comprova les dades";

        return redirect()->route('user-home')->with('status', $status);
    
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
