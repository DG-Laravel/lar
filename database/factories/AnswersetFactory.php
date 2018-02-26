<?php

use Faker\Generator as Faker;

$factory->define(App\Answerset::class, function (Faker $faker) {
    return [
        //'userid' => $factory->create(App\User::class)->id,
		//'questionsetid' => $factory->create(App\Questionset::class)->id
    ];
});
