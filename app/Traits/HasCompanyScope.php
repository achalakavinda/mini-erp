<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

trait HasCompanyScope
{
    public function companyIds()
    {
        $user = auth()->user();
        
        if (!$user) {
            throw new Exception('No authenticated user.');
        }

        $companyIds = [];

        if (method_exists($user, 'companies')) {
            // Assuming a relation like $user->companies()->pluck('id')
            $companyIds = $user->companies()->pluck('id')->toArray();
        } elseif (!empty($user->company_id)) {
            $companyIds = [$user->company_id];
        }
        
        return $companyIds;
    }


    /**
     * Scope a query to only include records belonging to the authenticated user's company/companies.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeOwnedByCompany(Builder $query)
    {
        // Handle multiple company IDs if available as an array or relation
        $companyIds = $this->companyIds();
        // echo dd($companyIds);
        return $query->whereIn('company_id', $companyIds);
    }


    public function checkCompanyAccess($companyId)
    {
        if (!in_array($companyId, $this->companyIds())) {
            abort(403, 'Access denied to this company.');
        }
    }

    /**
     * Scope a query to only include records belonging to the authenticated user's company/companies.
     *
     * @param  Builder  $query
     * @return Builder
     */
     public function scopeUserOwnedCompany(Builder $query)
    {
        // Handle multiple company IDs if available as an array or relation
        $companyIds = $this->companyIds();
        return $query->whereIn('id', $companyIds);
    }


}
