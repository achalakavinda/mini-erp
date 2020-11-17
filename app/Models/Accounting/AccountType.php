<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $guarded = ['id'];

    public function mainAccountType(){
        return $this->belongsTo('App\Models\Accounting\MainAccountType','main_account_types_id','id');
    }
}