const glob = require('glob');
const mix = require('laravel-mix');

mix.version();
mix.disableSuccessNotifications();

/** Vue Components */
mix.ts('resources/js/app.ts', 'public/js').sourceMaps();

/** Admin */
mix.sass('resources/sass/admin.scss', 'public/admin.css');

/** Themes */
let dirs = glob.sync('*', { cwd: './resources/views/' });
let themes = dirs.filter(dir => dir !== 'vendor');
themes.forEach(theme => {
    mix.sass(`resources/views/${theme}/theme.scss`, `public/${theme}`);
});