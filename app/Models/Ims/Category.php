<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function itemCodes(){
        return $this->hasMany('App\Models\Ims\ItemCode');
    }
}
