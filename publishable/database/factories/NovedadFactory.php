<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Web\Novedades\Novedad;
use App\Web\Novedades\Categoria;

$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'slug'   => $faker->slug(2),
        'color'  => $faker->hexColor,
        'nombre' => $faker->sentence(2),
        'habilitado' => true,
    ];
});

$factory->define(Novedad::class, function (Faker $faker) {
    return [
        'slug'   => $faker->slug(4),
        'estado' => Novedad::ESTADO_PUBLICADO,

        'fotos' => 'novedades/ejemplo.jpg',

        'nombre' => $faker->sentence(4),
        'copete' => $faker->sentence(10),
        'description' => $faker->randomHtml(),

        'seo_description' => $faker->sentence(50),
        'seo_keywords'    => $faker->words(20, true),
    ];
});

$factory->state(Novedad::class, Novedad::ESTADO_BORRADOR, ['estado' => Novedad::ESTADO_BORRADOR]);
$factory->state(Novedad::class, Novedad::ESTADO_PUBLICADO, ['estado' => Novedad::ESTADO_PUBLICADO]);
$factory->state(Novedad::class, Novedad::ESTADO_DESHABILITADO, ['estado' => Novedad::ESTADO_DESHABILITADO]);
