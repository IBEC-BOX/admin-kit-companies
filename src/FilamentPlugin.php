<?php

namespace AdminKit\Companies;

use AdminKit\Companies\UI\Filament\Resources\CompanyResource;
use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-plugin-admin-kit-companies';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            CompanyResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
    }

    public static function make(): static
    {
        return app(static::class);
    }
}
