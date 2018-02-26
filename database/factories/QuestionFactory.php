<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'question' => $faker->text,
        //'questionsetid' => $factory->create(App\QuestionSet::class)->id, //post in test case
		'questiontype' => $faker->randomElement(['radio' ,'checkbox'])
    ];
});
