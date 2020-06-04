<?php

return [

    'user' => [
        'default_role'   => 'user',
        'default_avatar' => 'users/default.png',
        'redirect'       => '/admin',
        'add_default_role_on_register' => true,
    ],

    'controllers' => ['namespace' => 'TCG\\Voyager\\Http\\Controllers'],

    'models' => [/*'namespace' => 'App\\'*/],

    'storage' => ['disk' => env('FILESYSTEM_DRIVER', 'public')],

    'hidden_files' => false,

    'database' => [
        'autoload_migrations' => true,
        'tables' => [
            'hidden' => [
                'data_rows',
                'data_types',
                'failed_jobs',
                'menu_items',
                'migrations',
                'password_resets',
                'permission_role',
                'settings',
                'translations',
            ],
        ],
    ],

    'multilingual' => [
        'enabled'  => false,
        'default'  => 'es',
        'locales'  => ['es'],
    ],

    'dashboard' => [
        'navbar_items' => [
            'voyager::generic.profile' => ['route' => 'voyager.profile', 'classes'    => 'class-full-of-rum', 'icon_class' => 'voyager-person'],
            'voyager::generic.home'    => ['route' => '/', 'icon_class'   => 'voyager-home', 'target_blank' => true],
            'voyager::generic.logout'  => ['route' => 'voyager.logout', 'icon_class' => 'voyager-power'],
        ],

        'widgets' => [
            'TCG\\Voyager\\Widgets\\UserDimmer',
            //'TCG\\Voyager\\Widgets\\PostDimmer',
            //'TCG\\Voyager\\Widgets\\PageDimmer',

            //'App\\Widgets\\ConsultasDimmer',
        ],
    ],

    'bread' => [
        'add_menu_item'  => true,
        'add_permission' => true,
        'default_menu'   => 'admin',
        'default_role'   => 'admin',
    ],

    'primary_color' => env('ADMIN_PRIMARY_COLOR', '#242a33'),

    'show_dev_tips' => true,

    'additional_css' => ['admin.css'],

    'additional_js' => [],

    'googlemaps' => [
        'key'    => env('GOOGLE_MAPS_KEY', ''),
        'zoom'   => env('GOOGLE_MAPS_DEFAULT_ZOOM', 11),
        'center' => [
            'lat' => env('GOOGLE_MAPS_DEFAULT_CENTER_LAT', '-34.6037389'),
            'lng' => env('GOOGLE_MAPS_DEFAULT_CENTER_LNG', '-58.3815704'),
        ]
    ],

    'settings' => ['cache' => false,],

    'compass_in_production' => false,

    'media' => [
        'allowed_mimetypes' => '*',
        // 'allowed_mimetypes' => ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'video/mp4'],

        'path'                => '/',
        'show_folders'        => true,
        'allow_upload'        => true,
        'allow_move'          => true,
        'allow_delete'        => true,
        'allow_create_folder' => true,
        'allow_rename'        => true,

        // 'watermark' => [ 'source' => 'watermark.png', 'position' => 'bottom-left', 'x' => 0, 'y' => 0, 'size' => 15 ],
        // 'thumbnails'   => [ [ 'type'  => 'fit', 'name'  => 'fit-500', 'width' => 500, 'height'=> 500 ], ]
    ]
];
