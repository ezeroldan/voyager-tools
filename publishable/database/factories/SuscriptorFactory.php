<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Web\Suscriptor;
use Faker\Generator as Faker;

$factory->define(Suscriptor::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
    ];
});
