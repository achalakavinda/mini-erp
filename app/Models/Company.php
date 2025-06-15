<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCompanyScope;

class Company extends Model
{
    use HasCompanyScope;

    protected $guarded = ['id'];
}
