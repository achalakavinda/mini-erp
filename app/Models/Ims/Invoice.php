<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = ['id'];

    public  function items(){
       return $this->hasMany('App\Models\Ims\InvoiceItem','invoice_id');
    }

    public  function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }

    public  function paymentStatus(){
        return $this->belongsTo('App\Models\Ims\InvoicePaymentStatus','invoice_payment_status_id');
    }
}