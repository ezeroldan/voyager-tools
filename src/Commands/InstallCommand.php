<?php

namespace EzeRoldan\VoyagerTools\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\File;
use EzeRoldan\VoyagerTools\VoyagerToolsServiceProvider;

class InstallCommand extends Command
{
    protected $name = 'voyager-tools:install';
    protected $description = 'Instala mis ajustes al Voyager package';

    protected $composer;

    public function __construct(Composer $composer)
    {
        parent::__construct();
        $this->composer = $composer;
    }

    public function handle()
    {
        File::deleteDirectory(database_path('/seeds'));
        File::makeDirectory(database_path('/seeds'));

        $tags =  ['seeds', 'config', 'assets', 'lang', 'routes', 'public', 'views'];
        $this->call('vendor:publish', ['--provider' => VoyagerToolsServiceProvider::class, '--tag' => $tags, '--force' => true]);

        $this->composer->dumpAutoloads();

        $this->call('migrate:fresh', ['--seed' => true]);
    }
}
