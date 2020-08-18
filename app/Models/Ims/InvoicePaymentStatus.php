<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;

class InvoicePaymentStatus extends Model
{
    protected $guarded = ['id'];
    protected $table = 'invoice_payment_status';

    public function ItemCode(){
        return $this->belongsTo('App\Models\Ims\ItemCode');
    }
}
