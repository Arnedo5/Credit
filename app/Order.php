<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable  = [
        'ORDID','ORDNUM','ORDIDUSER','ORDSUBTOTAL','ORDIDSTEP','ORDIDCATEGORY','ORIDREPARE','ORDSTATUS'
    ];
 
    public $timestamps = false;
}
