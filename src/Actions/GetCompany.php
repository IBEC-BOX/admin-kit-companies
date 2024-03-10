<?php

namespace AdminKit\Companies\Actions;

use Spatie\LaravelData\Data;
use AdminKit\Companies\Models\Company;
use AdminKit\Companies\UI\API\DTO\CompanyDTO;

class GetCompany
{
    public function run(): Data
    {
        $company = Company::query()
            ->firstOrFail();

        return CompanyDTO::from($company);
    }
}
