<?php

declare(strict_types=1);

namespace AdminKit\Companies\UI\API\Controllers;

use AdminKit\Companies\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::all();
    }

    public function show(int $id)
    {
        return Company::findOrFail($id);
    }
}
