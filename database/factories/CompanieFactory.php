<?php

use Faker\Generator as Faker;
use App\Companie;

$factory->define(Companie::class, function (Faker $faker) {
    return [
        'nume' => $faker->company,
        'cui' => $faker->numberBetween(10000000, 99999999),
        'judet' => $faker->state,
        'localitate' => $faker->city,
        'adresa' => $faker->address,
    ];
});
