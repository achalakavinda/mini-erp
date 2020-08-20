<?php

namespace App\Models\Ims;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    protected $guarded = ['id'];

    public  function items(){
        return $this->hasMany('App\Models\Ims\SalesOrderItem','sales_order_id');
    }

    public  function customer(){
        return $this->belongsTo(Customer::class);
    }
}
