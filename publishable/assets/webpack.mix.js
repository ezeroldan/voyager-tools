const mix = require('laravel-mix');

mix.disableSuccessNotifications();

/** Admin */
mix.sass('resources/sass/admin.scss', 'public/admin.css');

/** Theme */
mix.js('resources/js/app.js', 'public/js');
mix.sass('resources/sass/app.scss', 'public/css');
