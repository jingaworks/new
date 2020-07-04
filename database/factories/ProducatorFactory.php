<?php

use Faker\Generator as Faker;
use App\Producator;

$factory->define(Producator::class, function (Faker $faker) {
    return [
        'titular' => $faker->name,
        'serie' => $faker->randomElement(['CT', 'CJ', 'TR', 'BV', 'MM', 'NT', 'MS', 'TM', 'BZ', 'IL', 'IF', 'AB']),
        'numar' => $faker->numberBetween(1000000, 9999999),
        'place' => $faker->city,
        'region' => $faker->state,
        'viza' => '2020',
        'phone' => "07" . $faker->numberBetween(10000000, 99999999),
        'descriere' => " Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus auctor venenatis mauris sit amet finibus. Curabitur pretium porttitor nulla, ac sollicitudin arcu tincidunt a. Aliquam id ligula nec sem pharetra lacinia id quis diam. Cras et congue leo, ac congue risus. Suspendisse vel enim sit amet sapien suscipit dignissim in at augue. Maecenas vel urna facilisis arcu ornare commodo at sed ligula. Nulla ut ante nec urna posuere sagittis eu ac eros. "
    ];
});
