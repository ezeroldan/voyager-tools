<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class AppSeed extends Command
{
    protected $description = 'Seeder del App para Produccion y Desarrollo';
    protected $signature   = 'app:seed
                              {--force : Forzar en Produccion}
                              {--dummy : Ejecutar DatabaseDummySeeder}';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $seed = $this->option('dummy') ? 'DatabaseDummySeeder' : 'DatabaseSeeder';

        $this->call('migrate:fresh', [
            '--seed'   => true,
            '--force'  => $this->option('force'),
            '--seeder' => $seed,
        ]);
    }
}
