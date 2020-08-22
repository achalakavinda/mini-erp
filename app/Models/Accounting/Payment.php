<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id'];

    public  function items(){
        return $this->hasMany('App\Models\Accounting\PaymentItem');
     }

    public function paymentType()
    {
        return $this->belongsTo('App\Models\Accounting\PaymentType');
    }
}