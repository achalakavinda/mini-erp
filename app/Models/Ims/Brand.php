<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = ['id'];

    public function itemCodes(){
        return $this->hasMany('App\Models\Ims\ItemCode');
    }
}