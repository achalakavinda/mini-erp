<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerService extends Model
{
    protected $table = "customer_sectors";
    public $guarded = ['id'];
}
