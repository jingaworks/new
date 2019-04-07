<?php

use Faker\Generator as Faker;
use App\Producator;

$factory->define(Producator::class, function (Faker $faker) {
    return [
        'titular' => $faker->name,
        'serie' => $faker->randomElement(['CT', 'CJ', 'TR', 'BV', 'MM', 'NT', 'MS', 'TM', 'BZ', 'IL', 'IF', 'AB']),
        'numar' => $faker->numberBetween(1000000, 9999999),
        'emitent' => $faker->city,
        'judet' => $faker->state,
        'viza' => '2019',
    ];
});
