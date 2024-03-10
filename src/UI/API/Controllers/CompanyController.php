<?php

declare(strict_types=1);

namespace AdminKit\Companies\UI\API\Controllers;

use AdminKit\Companies\Actions\GetCompany;

class CompanyController extends Controller
{
    public function showFirst()
    {
        return app(GetCompany::class)->run();
    }
}
