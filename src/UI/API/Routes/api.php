<?php

use AdminKit\Companies\UI\API\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('company', [CompanyController::class, 'showFirst']);
