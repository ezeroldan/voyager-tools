const mix = require('laravel-mix');

mix.disableSuccessNotifications();

/** Admin */
mix.sass('resources/sass/admin.scss', 'public/admin.css');

/** Theme */
mix.ts('resources/js/app.ts', 'public/js');
mix.sass('resources/sass/app.scss', 'public/css');
