<?php

declare(strict_types=1);

namespace AdminKit\Companies\UI\API\Controllers;

use AdminKit\Companies\Actions\GetCompany;
use AdminKit\Companies\UI\API\DTO\CompanyDTO;

class CompanyController extends Controller
{
    /**
     * @response CompanyDTO
     */
    public function showFirst(): CompanyDTO
    {
        return app(GetCompany::class)->run();
    }
}
