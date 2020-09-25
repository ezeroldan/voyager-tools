<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Igaster\LaravelTheme\Facades\Theme;
use Illuminate\Support\Facades\Response;

class PwaController extends Controller
{
    public function serviceworker()
    {
        $content = [];

        $content[] = 'var staticCacheName = "pwa-v" + new Date().getTime();';
        $file = [
            '/offline',
            '/js/app.js',
            Theme::url('theme.css'),
            Theme::url('pwa/icon-72x72.png'),
            Theme::url('pwa/icon-96x96.png'),
            Theme::url('pwa/icon-128x128.png'),
            Theme::url('pwa/icon-144x144.png'),
            Theme::url('pwa/icon-152x152.png'),
            Theme::url('pwa/icon-192x192.png'),
            Theme::url('pwa/icon-384x384.png'),
            Theme::url('pwa/icon-512x512.png'),
        ];

        $files = chr(10) . "'" . implode("'," . chr(10) . "'", $file) . "'"  . chr(10);
        $content[] = "var filesToCache = [{$files}];";

        $content[] = <<<JS
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches
            .open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    );
});
JS;

        $content[] = <<<JS
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});
JS;

        $content[] = <<<JS
self.addEventListener("fetch", event => {
    event.respondWith(
        caches
            .match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    );
});
JS;

        return Response::make(implode(chr(10) . chr(10), $content), 200, ["Content-Type" => "application/javascript"]);
    }
}
