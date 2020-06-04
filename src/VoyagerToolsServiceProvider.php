<?php

namespace EzeRoldan\VoyagerTools;

use Illuminate\Support\ServiceProvider;
use EzeRoldan\VoyagerTools\Commands\AssetsCommand;
use EzeRoldan\VoyagerTools\Commands\InstallCommand;

class VoyagerToolsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole() && $this->app->environment('local')) {

            /** Commands  */
            $this->commands([AssetsCommand::class]);
            $this->commands([InstallCommand::class]);

            /** Publishes  */
            $pubPath = dirname(__DIR__) . '/publishable';
            $publishable = [
                'assets' => [
                    "{$pubPath}/assets/js/"                     => resource_path('js'),
                    "{$pubPath}/assets/sass/"                   => resource_path('sass'),
                    "{$pubPath}/assets/storage/users/"          => storage_path('app/public/users'),
                    "{$pubPath}/assets/storage/settings/"       => storage_path('app/public/settings'),
                    "{$pubPath}/assets/webpack.mix.js"          => base_path('webpack.mix.js'),
                    "{$pubPath}/assets/package.json"            => base_path('package.json'),
                    "{$pubPath}/assets/tsconfig.json"           => base_path('tsconfig.json'),
                ],
                'database' => [
                    "{$pubPath}/database/seeds/"                => database_path('seeds'),
                    "{$pubPath}/database/migrations/"           => database_path('migrations')
                ],
                'config'      => ["{$pubPath}/config/"          => config_path('/')],
                'lang'        => ["{$pubPath}/lang/"            => resource_path('lang')],
                'routes'      => ["{$pubPath}/routes/web.php"   => base_path('routes/web.php')],
                'public'      => ["{$pubPath}/public/"          => public_path()],
                'stubs'       => ["{$pubPath}/stubs/"           => base_path('stubs')],
                'views'       => ["{$pubPath}/views/"           => resource_path('views')],
            ];

            foreach ($publishable as $group => $paths) {
                $this->publishes($paths, $group);
            }
        }
    }

    public function register()
    {
    }
}
