<?php

use Faker\Generator as Faker;
use App\Companie;

$factory->define(Companie::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'cui' => $faker->numberBetween(10000000, 99999999),
        'region' => $faker->state,
        'place' => $faker->city,
        'phone' => '07' . $faker->numberBetween(10000000, 99999999),
        'address' => $faker->address,
    ];
});
