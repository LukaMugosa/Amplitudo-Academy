<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Assignment::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'title' => $faker->word,
        'description' => $faker->text,
        'deadline' => $faker->date()
    ];
});
