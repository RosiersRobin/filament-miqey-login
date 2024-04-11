<?php

namespace RosiersRobin\FilamentMiqeyLogin\Commands;

use Illuminate\Console\Command;

class FilamentMiqeyLoginCommand extends Command
{
    public $signature = 'filament-miqey-login';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
