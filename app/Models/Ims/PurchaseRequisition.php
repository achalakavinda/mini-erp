<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequisition extends Model
{
    protected $guarded = ['id'];

    public  function items(){
        return $this->hasMany('App\Models\Ims\PurchaseRequisitionItem');
    }

    public  function purchaseRequisitionStatus(){
        return $this->belongsTo('App\Models\Ims\PurchaseRequisitionStatus');
    }

    public  function supplier(){
        return $this->belongsTo('App\Models\Ims\Supplier');
    }

}