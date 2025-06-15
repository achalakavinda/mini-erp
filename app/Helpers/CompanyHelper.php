<?php

namespace App\Helpers;

class CompanyHelper
{
    public static function checkUserCompaniesAccess($companyId, $authorizedCompanyIds)
    {
        if (!in_array($companyId, $authorizedCompanyIds)) {
            abort(403, 'Unauthorized company access.');
        }
    }
}
