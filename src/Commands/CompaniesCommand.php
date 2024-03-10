<?php

namespace AdminKit\Companies\Commands;

use Illuminate\Console\Command;

class CompaniesCommand extends Command
{
    public $signature = 'admin-kit-companies';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
