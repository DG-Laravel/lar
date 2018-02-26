<?php

use Faker\Generator as Faker;

$factory->define(App\Questionoption::class, function (Faker $faker) {
    return [
        'option' => $faker->text,
		//'questionid' => $factory->create(App\Question::class)->id
    ];
});
