<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CusSector extends Model
{

    protected $table = 'cus_sectors';
    protected $fillable = ['customer_id','sector_id'];

}
