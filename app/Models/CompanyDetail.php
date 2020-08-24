<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    protected $table = 'company_details';

    public function CompanyDetailType(){
        return $this->belongsTo(CompanyDetail::class,'code','company_detail_code');
    }
}
