<?php

namespace AdminKit\Companies\Actions;

use AdminKit\Companies\Models\Company;
use AdminKit\Companies\UI\API\DTO\CompanyDTO;
use Spatie\LaravelData\Data;

class GetCompany
{
    public function run(): Data
    {
        $company = Company::query()
            ->firstOrFail();

        return CompanyDTO::from($company);
    }
}
