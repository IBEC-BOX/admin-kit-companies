<?php

use Illuminate\Support\Facades\Route;
use AdminKit\Companies\UI\API\Controllers\CompanyController;

Route::get('company', [CompanyController::class, 'showFirst']);
