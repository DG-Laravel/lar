<?php

use Faker\Generator as Faker;

$factory->define(App\Questionset::class, function (Faker $faker) {
    return [
        'name' => $faker->text
    ];
});
