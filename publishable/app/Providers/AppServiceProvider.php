<?php

namespace App\Providers;

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Igaster\LaravelTheme\Facades\Theme;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
    }

    public function boot()
    {
        Schema::defaultStringLength(191);
        if (Schema::hasTable('settings')) {

            /** Seotools */
            Config::set('seotools.meta.defaults.title',       Voyager::setting('site.title'));
            Config::set('seotools.meta.defaults.description', Voyager::setting('site.description'));

            Config::set('seotools.opengraph.defaults.title',       Voyager::setting('site.title'));
            Config::set('seotools.opengraph.defaults.description', Voyager::setting('site.description'));

            Config::set('seotools.json-ld.defaults.title',       Voyager::setting('site.title'));
            Config::set('seotools.json-ld.defaults.description', Voyager::setting('site.description'));

            /** Voyager */
            Config::set('voyager.primary_color', Theme::getSetting('color', '#242a33'));

            /** Laravel PWA */
            Config::set('laravelpwa.manifest.theme_color',      Theme::getSetting('color', '#000000'));
            Config::set('laravelpwa.manifest.background_color', Theme::getSetting('background_color', '#ffffff'));

            /** Laravel PWA: icons */
            Config::set('laravelpwa.manifest.icons.72x72.path',   Theme::url('pwa/icon-72x72.png'));
            Config::set('laravelpwa.manifest.icons.96x96.path',   Theme::url('pwa/icon-96x96.png'));
            Config::set('laravelpwa.manifest.icons.128x128.path', Theme::url('pwa/icon-128x128.png'));
            Config::set('laravelpwa.manifest.icons.144x144.path', Theme::url('pwa/icon-144x144.png'));
            Config::set('laravelpwa.manifest.icons.152x152.path', Theme::url('pwa/icon-152x152.png'));
            Config::set('laravelpwa.manifest.icons.192x192.path', Theme::url('pwa/icon-192x192.png'));
            Config::set('laravelpwa.manifest.icons.384x384.path', Theme::url('pwa/icon-384x384.png'));
            Config::set('laravelpwa.manifest.icons.512x512.path', Theme::url('pwa/icon-512x512.png'));

            /** Laravel PWA: splash */
            Config::set('laravelpwa.manifest.splash.640x1136',  Theme::url('pwa/splash-640x1136.png'));
            Config::set('laravelpwa.manifest.splash.750x1334',  Theme::url('pwa/splash-750x1334.png'));
            Config::set('laravelpwa.manifest.splash.828x1792',  Theme::url('pwa/splash-828x1792.png'));
            Config::set('laravelpwa.manifest.splash.1125x2436', Theme::url('pwa/splash-1125x2436.png'));
            Config::set('laravelpwa.manifest.splash.1242x2208', Theme::url('pwa/splash-1242x2208.png'));
            Config::set('laravelpwa.manifest.splash.1242x2688', Theme::url('pwa/splash-1242x2688.png'));
            Config::set('laravelpwa.manifest.splash.1536x2048', Theme::url('pwa/splash-1536x2048.png'));
            Config::set('laravelpwa.manifest.splash.1668x2224', Theme::url('pwa/splash-1668x2224.png'));
            Config::set('laravelpwa.manifest.splash.1668x2388', Theme::url('pwa/splash-1668x2388.png'));
            Config::set('laravelpwa.manifest.splash.2048x2732', Theme::url('pwa/splash-2048x2732.png'));

            /** Laravel PWA: shortcuts */
            $shortcuts = [
                [
                    'url' => 'consulta',
                    'name' => 'Generar Consulta',
                    'description' => 'Dejanos una Consulta',
                    'icons' => ['purpose' => 'any', 'src' => Theme::url('pwa/consulta.png')]
                ],
            ];
            Config::set('laravelpwa.manifest.shortcuts', $shortcuts);
        }
    }
}
