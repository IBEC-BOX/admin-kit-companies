<?php

use Illuminate\Support\Facades\Route;
use AdminKit\Companies\UI\API\Controllers\CompanyController;

Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{id}', [CompanyController::class, 'show']);
