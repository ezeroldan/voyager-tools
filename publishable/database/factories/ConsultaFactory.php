<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Web\Consulta;
use Faker\Generator as Faker;

$factory->define(Consulta::class, function (Faker $faker) {
    return [
        'email'    => $faker->email,
        'nombre'   => $faker->firstName,
        'apellido' => $faker->lastName,
        'telefono' => $faker->phoneNumber,
        'mensaje'  => $faker->paragraph(),
    ];
});
