<?php

namespace EzeRoldan\VoyagerTools\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\File;
use EzeRoldan\VoyagerTools\VoyagerToolsServiceProvider;

class InstallCommand extends Command
{
    protected $composer;

    protected $signature   = 'voyager-tools:install {--force : Force the operation to run}';
    protected $description = 'Instala mis ajustes al Voyager package';

    public function __construct(Composer $composer)
    {
        parent::__construct();
        $this->composer = $composer;
    }

    public function handle()
    {

        $this->call('vendor:publish', ['--provider' => VoyagerToolsServiceProvider::class, '--tag' => ['config'], '--force' => $this->option('force')]);

        $this->call('migrate:fresh');
        $this->call('voyager:install');

        if ($this->option('force')) {
            File::cleanDirectory(resource_path('/js'));
            File::cleanDirectory(resource_path('/sass'));
            File::cleanDirectory(resource_path('/views'));
            File::cleanDirectory(database_path('/seeds'));
        }

        $this->info('vendor:publish');
        $tags = ['database', 'config', 'assets', 'lang', 'routes', 'public', 'stubs', 'views'];
        $this->call('vendor:publish', ['--provider' => VoyagerToolsServiceProvider::class, '--tag' => $tags, '--force' => $this->option('force')]);

        $this->info('composer dump-autoload');
        $this->composer->setWorkingPath(base_path())->dumpAutoloads();

        $this->info('migrate:fresh');
        $this->call('migrate:fresh', ['--seed' => true]);
    }
}
