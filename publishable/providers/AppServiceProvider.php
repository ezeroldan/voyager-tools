<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /** Seotools */
        config(['seotools.meta.defaults.title' => setting('site.title')]);
        config(['seotools.meta.defaults.description' => setting('site.description')]);

        config(['seotools.opengraph.defaults.title' => setting('site.title')]);
        config(['seotools.opengraph.defaults.description' => setting('site.description')]);

        config(['seotools.json-ld.defaults.title' => setting('site.title')]);
        config(['seotools.json-ld.defaults.description' => setting('site.description')]);
    }
}
