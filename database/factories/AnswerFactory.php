<?php

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {
    return [
        //'answersetsid' => $factory->create(App\AnswerSet::class)->id,
		//'questionoptionsid' => $factory->create(App\Questionoptions::class)->id
    ];
});
