<?php

namespace EzeRoldan\VoyagerTools;

use Illuminate\Support\ServiceProvider;
use EzeRoldan\VoyagerTools\Commands\InstallCommand;

class VoyagerToolsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole() && $this->app->environment('local')) {

            /** Commands  */
            $this->commands([InstallCommand::class]);

            /** Publishes  */
            $publishable = [
                'assets' => [
                    'assets/js/'   => resource_path('js'),
                    'assets/sass/' => resource_path('sass'),
                    'assets/storage/users/' => storage_path('app/public/users'),
                    'assets/storage/settings/' => storage_path('app/public/settings'),
                    'assets/webpack.mix.js' => base_path('webpack.mix.js'),
                ],
                'config' => ['config/' => config_path('/')],
                'lang'   => ['lang/'              => resource_path('lang')],
                'routes' => ['routes/web.php'     => base_path('routes/web.php')],
                'public' => ['public/'            => public_path()],
                'seeds'  => ['database/seeds/'    => database_path('seeds')],
                'stubs'  => ['stubs/'             => base_path('stubs')],
                'views'  => ['views/'             => resource_path('views')],
            ];

            $pubPath = dirname(__DIR__) . '/publishable';

            foreach ($publishable as $group => $paths) {

                array_walk($paths, function (&$path) use ($pubPath) {
                    $path = "{$pubPath}/{$path}";
                });

                dd($paths);

                $this->publishes($paths, $group);
            }
        }
    }

    public function register()
    {
    }
}
