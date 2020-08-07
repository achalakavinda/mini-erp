<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    protected $guarded = ['id'];

    public  function items(){
        return $this->hasMany('App\Models\Ims\SalesOrderItem','sales_order_id');
    }
}