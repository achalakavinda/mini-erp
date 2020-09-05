<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class AccountEntryItem extends Model
{
    protected $guarded = ['id'];
    
    public function AccountEntry(){
        return $this->belongsTo(AccountEntry::class);
    }
}