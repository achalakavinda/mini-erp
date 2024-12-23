<?php

namespace App\Models\Meta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientIp extends Model
{
    use HasFactory;
    protected $connection = 'mysqlMetaDB';
    protected $guarded = ['id'];
}
