<?php

namespace AdminKit\Companies\Actions;

use AdminKit\Companies\Models\Company;
use AdminKit\Companies\UI\API\DTO\CompanyDTO;

class GetCompany
{
    public function run(): CompanyDTO
    {
        $company = Company::query()
            ->firstOrFail();

        return CompanyDTO::from($company);
    }
}
