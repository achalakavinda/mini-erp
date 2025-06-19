<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasCompanyScope;

class Customer extends Model
{
    use HasFactory;
    use HasCompanyScope;

    public $guarded = ['id'];
}
