<?php

namespace AdminKit\Companies;

use AdminKit\Companies\Commands\CompaniesCommand;
use AdminKit\Companies\Providers\RouteServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CompaniesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('admin-kit-companies')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations()
            ->hasMigrations([
                'create_admin_kit_companies_table',
                'create_admin_kit_company_histories_table',
                'create_admin_kit_company_managers_table',
            ])
            ->hasCommand(CompaniesCommand::class);
    }

    public function registeringPackage()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
