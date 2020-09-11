<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;

class JnlItem extends Model
{
    protected $guarded = ['id'];

    public function ItemCode(){
        return $this->belongsTo('App\Models\Ims\ItemCode');
    }
}
