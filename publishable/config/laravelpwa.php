<?php

return [
    'name' => env('APP_NAME', 'App'),
    'manifest' => [

        'name'             => env('APP_NAME', 'App'),
        'short_name'       => env('APP_NAME', 'App'),
        'start_url'        => '/',
        'theme_color'      => '#000000',
        'background_color' => '#ffffff',
        'display'          => 'standalone',
        'status_bar'       => 'black',
        'orientation'      => 'portrait-primary',

        'icons' => [
            '72x72'   => ['purpose' => 'any', 'path' => '/pwa/icon-72x72.png'],
            '96x96'   => ['purpose' => 'any', 'path' => '/pwa/icon-96x96.png'],
            '128x128' => ['purpose' => 'any', 'path' => '/pwa/icon-128x128.png'],
            '144x144' => ['purpose' => 'any', 'path' => '/pwa/icon-144x144.png'],
            '152x152' => ['purpose' => 'any', 'path' => '/pwa/icon-152x152.png'],
            '192x192' => ['purpose' => 'any', 'path' => '/pwa/icon-192x192.png'],
            '384x384' => ['purpose' => 'any', 'path' => '/pwa/icon-384x384.png'],
            '512x512' => ['purpose' => 'any', 'path' => '/pwa/icon-512x512.png'],
        ],

        'splash' => [
            '640x1136'  => '/pwa/splash-640x1136.png',
            '750x1334'  => '/pwa/splash-750x1334.png',
            '828x1792'  => '/pwa/splash-828x1792.png',
            '1125x2436' => '/pwa/splash-1125x2436.png',
            '1242x2208' => '/pwa/splash-1242x2208.png',
            '1242x2688' => '/pwa/splash-1242x2688.png',
            '1536x2048' => '/pwa/splash-1536x2048.png',
            '1668x2224' => '/pwa/splash-1668x2224.png',
            '1668x2388' => '/pwa/splash-1668x2388.png',
            '2048x2732' => '/pwa/splash-2048x2732.png',
        ],

        'shortcuts' => [],

        'custom' => []
    ]
];
