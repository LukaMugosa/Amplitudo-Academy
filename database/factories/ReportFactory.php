<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Report::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,4),
        'title' => $faker->word,
        'body' => $faker->text,
    ];
});
