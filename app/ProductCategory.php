<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{

    protected $table = 'product_categories';

    protected $column = 'PRCID';

    protected $fillable = [
        'PRCID','PRCNUM','PRCNAME','PRCDESCRIPTION','PRCIMG','PRCSTATUS'
    ];

    public $timestamps = false;
}
