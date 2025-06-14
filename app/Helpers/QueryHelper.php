<?php

namespace App\Helpers;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;

class QueryHelper
{
    public static function applyCompanyScope(Builder $query)
    {
        $user = Auth::user();

        // Example: if user has multiple companies (assuming it's an array or relation)
        $companyIds = is_array($user->company_id) ? $user->company_id : [$user->company_id];

        return $query->whereIn('company_id', $companyIds);
    }
}
