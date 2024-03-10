<?php

namespace AdminKit\Companies\UI\Filament\Resources\CompanyResource\Pages;

use AdminKit\Companies\UI\Filament\Resources\CompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompany extends ListRecords
{
    protected static string $resource = CompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
