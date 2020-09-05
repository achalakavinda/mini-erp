<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class AccountEntry extends Model
{
    public function AccountType(){
        return $this->belongsTo(AccountType::class);
    }
}
