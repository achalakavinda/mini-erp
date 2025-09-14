<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCompanyScope;

class Appointment extends Model
{
    use HasFactory;
    use HasCompanyScope;

    protected $guarded = ['id'];

    public function setConnection($connection)
    {
        $this->connection = $connection;
        return $this;
    }

    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }

    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class);
    }
}
