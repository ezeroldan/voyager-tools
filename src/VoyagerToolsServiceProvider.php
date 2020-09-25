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

            $publishable = [
                'app'       => ['app'       => base_path('app')],
                'config'    => ['config'    => base_path('config')],
                'database'  => ['database'  => base_path('database')],
                'public'    => ['public'    => base_path('public')],
                'resources' => ['resources' => base_path('resources')],
                'routes'    => ['routes'    => base_path('routes')],
                'storage'   => ['storage'   => base_path('storage')],
                'stubs'     => ['stubs'     => base_path('stubs')],
                'root'      => [
                    'webpack.mix.js' => base_path('webpack.mix.js'),
                    'package.json'   => base_path('package.json'),
                    'tsconfig.json'  => base_path('tsconfig.json'),
                ],
            ];

            foreach ($publishable as $group => $folders) {
                $paths = [];
                foreach ($folders as $key => $value) {
                    $paths[dirname(__DIR__) . "/publishable/{$key}"] = $value;
                }
                $this->publishes($paths, $group);
            }
        }
    }

    public function register()
    {
    }
}
