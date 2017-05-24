<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'USRLOGIN', 'USRMAIL', 'USRPASSWORD',
    ];

    protected $primaryKey = 'USRID';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function getAuthPassword()
    {
        return $this->USRPASSWORD;
    }

    public function getEmailForPasswordReset()
    {
        return $this->USRMAIL;
        
    }
}
