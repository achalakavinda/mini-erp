<?php

namespace App\Models\GeneralLedger;

use Illuminate\Database\Eloquent\Model;

class GeneralLedger extends Model
{
    protected $guarded = ['id'];

    public function LedgerCode(){
        return $this->belongsTo('App\Models\GeneralLedger\GLCode');
    }
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
    public function JournalCode(){
        return $this->belongsTo('App\Models\GeneralLedger\JournalCode');
    }
}
