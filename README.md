# [TCG Voyager](https://github.com/the-control-group/voyager) Tools para mis proyectos

Este es un paquete de Tools para facilitar el uso del panel admin [TCG Voyager](https://github.com/the-control-group/voyager).

## Instalacion
```BASH
laravel new app
cd app
```

```BASH
composer require ezeroldan/voyager-tools
php artisan voyager-tools:install --force
```

```BASH
npm i && npm run dev
```

## Local Development

```json
"repositories": [
    {
        "type": "path",
        "url": "../voyager-tools",
        "options": {
            "symlink": true
        }
    }
]
```

```json
"require": {
    "ezeroldan/voyager-tools": "*"
}
```

