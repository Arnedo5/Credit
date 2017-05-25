<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'USRLOGIN' => 'required|string|max:50|unique:users',
            'USRMAIL' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'USRNAME' => 'required|string|max:50',
            'USRLASTNAME' => 'required|string|max:350',
            'USRCITY' => 'required|string|max:350',
            'USRDIRECTION' => 'required|string|max:50',
            'USRIMG' => 'image|mimes:jpeg,png,bmp,gif,svg',
        ]);
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $categories = DB::table('product_categories')
            ->where('PRCSTATUS', true)
            ->get();
            
        $user = DB::table('users')
            ->count();
        $user++;

        if (array_key_exists('USRIMG', $data)) {
            $urlImage = 'img/profileImage/profile'.$user.'.png';
        } else {
            $urlImage = 'img/profileImage/default.png';
        }

        return User::create([
            'USRNUM' => $user,
            'USRTYPE' => 'user',
            'USRLOGIN' => $data['USRLOGIN'],
            'USRNAME' => $data['USRNAME'],
            'USRLASTNAME' => $data['USRLASTNAME'],
            'USRMAIL' => $data['USRMAIL'],
            'USRPASSWORD' => bcrypt($data['password']),
            'USRCITY' => $data['USRCITY'],
            'USRDIRECTION' => $data['USRDIRECTION'],
            'USRPOSTAL' => $data['USRPOSTAL'],
            'USRMOBILE' => $data['USRMOBILE'],
            'USRDESCRIPTION' => 'Usuari estàndard',
            'USRIMG' => $urlImage,
            'USRSTATUS' => true,
        ]);
    }
}


//if (Auth:: USRSTATUS == true ) => LOGOUT OR LOGIN