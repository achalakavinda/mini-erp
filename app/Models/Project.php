<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCompanyScope;

class Project extends Model
{
    use HasCompanyScope;

    public $guarded = ['id'];

     public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }
}
