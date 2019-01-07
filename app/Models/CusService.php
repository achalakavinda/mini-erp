<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CusService extends Model
{
    protected $table = 'cus_services';
    protected $fillable = ['customer_id','service_id'];
}
