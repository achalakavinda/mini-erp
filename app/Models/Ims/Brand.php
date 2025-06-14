<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    public function itemCodes(){
        return $this->hasMany('App\Models\Ims\ItemCode');
    }
}