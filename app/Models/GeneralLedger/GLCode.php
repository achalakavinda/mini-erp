<?php

namespace App\Models\GeneralLedger;

use Illuminate\Database\Eloquent\Model;

class GLCode extends Model
{
    protected $guarded = ['id'];

    public function gl()
    {
        return $this->belongsTo('App\Models\GeneralLedger\GeneralLedger');
    }
}
