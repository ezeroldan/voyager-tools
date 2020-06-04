<?php

namespace EzeRoldan\VoyagerTools\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\File;
use EzeRoldan\VoyagerTools\VoyagerToolsServiceProvider;

class AssetsCommand extends Command
{
    protected $composer;

    protected $signature   = 'voyager-tools:assets {--force : Force the operation to run}';
    protected $description = 'Exportar assets';

    public function __construct(Composer $composer)
    {
        parent::__construct();
        $this->composer = $composer;
    }

    public function handle()
    {
        if ($this->option('force')) {
            File::cleanDirectory(resource_path('/js'));
            File::cleanDirectory(resource_path('/sass'));
        }

        $this->info('vendor:publish');
        $this->call('vendor:publish', ['--provider' => VoyagerToolsServiceProvider::class, '--tag' => ['assets'], '--force' => $this->option('force')]);
    }
}
