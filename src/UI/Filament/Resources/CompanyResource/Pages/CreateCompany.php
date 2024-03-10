<?php

namespace AdminKit\Companies\UI\Filament\Resources\CompanyResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use AdminKit\Companies\UI\Filament\Resources\CompanyResource;

class CreateCompany extends CreateRecord
{
    protected static string $resource = CompanyResource::class;

    protected function getActions(): array
    {
        return [
            //
        ];
    }

    protected function getRedirectUrl(): string
    {
        return CompanyResource::getUrl();
    }
}
