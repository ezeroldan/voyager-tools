# [TCG Voyager](https://github.com/the-control-group/voyager) Tools para mis proyectos

Este es un paquete de Tools para facilitar el uso del panel admin [TCG Voyager](https://github.com/the-control-group/voyager).

## Instalacion

### Generar Aplicacion
```bash
composer create-project laravel/laravel app "7.0"
```

### Configurar

```bash
nano .env

# Configurar Theme
APP_THEME="default"

# Configurar DB
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=root

# Configurar Google Analytics
SITE_GOOGLE_ANALYTICS_ID=
ADMIN_GOOGLE_ANALYTICS_ID=

# Configurar Recaptcha
RECAPTCHA_SITE_KEY=
RECAPTCHA_SECRET_KEY=

# Configurar Google Maps
GOOGLE_MAPS_KEY=""
GOOGLE_MAPS_DEFAULT_ZOOM=10
GOOGLE_MAPS_DEFAULT_CENTER_LAT="-34.6037389"
GOOGLE_MAPS_DEFAULT_CENTER_LNG="-58.3815704"
MIX_GOOGLE_MAPS_KEY="${GOOGLE_MAPS_KEY}"

```

### Dependencias
```bash
composer require fzaninotto/faker google/recaptcha artesaos/seotools usmanhalalit/laracsv igaster/laravel-theme spatie/laravel-sitemap silviolleite/laravelpwa barryvdh/laravel-debugbar tucker-eric/eloquentfilter
```

### Instalacion
```bash
composer require tcg/voyager ezeroldan/voyager-tools

php artisan voyager-tools:install

npm i && npm run dev
```

## Ejecutar seeders
```bash
php artisan app:seed --dummy
```