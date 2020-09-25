<?php

namespace EzeRoldan\VoyagerTools\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\File;
use EzeRoldan\VoyagerTools\VoyagerToolsServiceProvider;

class InstallCommand extends Command
{
    protected $composer;

    protected $signature   = 'voyager-tools:install';
    protected $description = 'Instala mis ajustes al Voyager package';

    public function __construct(Composer $composer)
    {
        parent::__construct();
        $this->composer = $composer;
    }

    public function handle()
    {
        $this->call('vendor:publish', ['--provider' => VoyagerToolsServiceProvider::class, '--tag' => ['config'], '--force' => true]);
        $this->call('voyager:install');

        File::cleanDirectory(resource_path('/js'));
        File::cleanDirectory(resource_path('/sass'));
        File::cleanDirectory(resource_path('/views'));
        File::cleanDirectory(database_path('/seeds'));
        File::cleanDirectory(database_path('/migrations'));

        $tags = ['app', 'database', 'public', 'resources', 'routes', 'storage', 'stubs', 'root'];
        $this->info('Publicar vendor');
        $this->call('vendor:publish', ['--provider' => VoyagerToolsServiceProvider::class, '--tag' => $tags, '--force' => true]);

        $this->info('composer dump-autoload');
        $this->composer->setWorkingPath(base_path())->dumpAutoloads();

        $this->info('Migrar la Base de Datos');
        $this->call('migrate:fresh', ['--seed' => true]);
    }
}
