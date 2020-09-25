<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Web\Sucursal;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Sucursal::class, function (Faker $faker) {

    $lng = $faker->randomFloat(2, -58.30, -58.60);
    $lat = $faker->randomFloat(2, -34.55, -34.70);

    return [
        'mapa'      => DB::raw("(GeomFromText('POINT({$lng} {$lat})'))"),
        'email'     => $faker->companyEmail,
        'nombre'    => $faker->company,
        'telefono'  => $faker->phoneNumber,
        'direccion' => $faker->address,
    ];
});
