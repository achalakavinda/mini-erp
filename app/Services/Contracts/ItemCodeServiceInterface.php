<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;


interface ItemCodeServiceInterface
{
    /**
     *
    */
    public function get(Request $request);
}
