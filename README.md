# [TCG Voyager](https://github.com/the-control-group/voyager) Tools para mis proyectos

Este es un paquete de Tools para facilitar el uso del panel admin [TCG Voyager](https://github.com/the-control-group/voyager).

## Instalacion

### Generar Aplicacion
```bash
composer create-project laravel/laravel app "7.0"
cd app

rm composer.lock
rm -r vendor

# Configurar DB
nano .env

APP_THEME="default"

DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=root

GOOGLE_MAPS_KEY=""
GOOGLE_MAPS_DEFAULT_ZOOM=10
GOOGLE_MAPS_DEFAULT_CENTER_LAT="-34.6037389"
GOOGLE_MAPS_DEFAULT_CENTER_LNG="-58.3815704"
MIX_GOOGLE_MAPS_KEY="${GOOGLE_MAPS_KEY}"

```

### Dependencias
```bash
composer require fzaninotto/faker
composer require google/recaptcha
composer require artesaos/seotools
composer require usmanhalalit/laracsv
composer require igaster/laravel-theme
composer require spatie/laravel-sitemap
composer require silviolleite/laravelpwa
composer require barryvdh/laravel-debugbar
composer require tucker-eric/eloquentfilter
```

### Instalacion
```bash
composer require tcg/voyager
composer require ezeroldan/voyager-tools

php artisan voyager-tools:install

npm i && npm run dev
```

## Ejecutar seeders
```bash
php artisan app:seed --dummy
```