<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class AccountEntry extends Model
{
    protected $guarded = ['id'];
    
    public function AccountType(){
        return $this->belongsTo(AccountType::class);
    }
}