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
        'USRNUM','USRTYPE','USRLOGIN','USRNAME','USRLASTNAME','USRMAIL','USRPASSWORD','USRCITY','USRDIRECTION','USRDESCRIPTION','USRPOSTAL','USRIMG','USRMOBILE', 'USRSTATUS'
        //'USRNUM','USRTYPE','USRLOGIN', 'USRMAIL', 'USRPASSWORD', 'USRSTATUS',
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
