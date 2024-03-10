<?php

namespace AdminKit\Companies\UI\Filament\Resources\CompanyResource\Pages;

use AdminKit\Companies\UI\Filament\Resources\CompanyResource;
use Filament\Resources\Pages\CreateRecord;

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
