<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $guarded = ['id'];

    public  function items(){
        return $this->hasMany('App\Models\Ims\QuotationItem','quotation_id');
    }
}
