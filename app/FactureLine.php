<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactureLine extends Model
{
    protected $table = 'facture_lines';

    protected $fillable  = [
        'FCLID','FCLNUM','FCLPRICE','FCLQUANTITY','FCLIDPRODUCT','FCLIDORDER'
    ];
 
    public $timestamps = false;
}
