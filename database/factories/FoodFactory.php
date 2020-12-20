<?php

use Faker\Generator as Faker;

$factory->define(App\Food::class, function (Faker $faker) {
    return [
        'id' => $faker->text(50),
        'vrsta' => $faker->text(50),
        'naziv' => $faker->text(50),
        'cijena' => $faker->text(50),
        'sastav' => $faker->text(150),
    ];
});
