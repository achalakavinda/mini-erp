<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyDetailType extends Model
{
    protected $guarded = ['id'];
    protected $table = 'company_detail_types';

    public function CompanyDetail(){
        return $this->hasMany(CompanyDetail::class,'company_detail_code','code');
    }

}
