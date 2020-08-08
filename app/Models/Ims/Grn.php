<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;

class Grn extends Model
{
    protected $guarded = ['id'];

    public  function items(){
        return $this->hasMany('App\Models\Ims\GrnItem','grn_id');
    }
}