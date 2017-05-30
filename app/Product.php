<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable  = [
        'PRDID','PRDNUM','PRDIDCATEGORY','PRDNAME','PRDDESCRIPTION','PRDIMG','PRDSTOCK','PRDPRICE','PRDSTATUS'
    ];
 
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\ProductCategory');
    }
}


