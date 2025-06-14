<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCompanyScope;

class Supplier extends Model
{
    use HasCompanyScope;

    protected $guarded = ['id'];
}
