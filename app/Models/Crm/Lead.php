<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCompanyScope;

class Lead extends Model
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
}
