<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaceInclude extends Model
{

    public  function include()
    {
        return $this->belongsTo('App\Models\IncludeType','include_type_id');
    }
}
