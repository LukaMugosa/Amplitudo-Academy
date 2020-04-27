<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Rating::class, function (Faker $faker) {
    return [
        'user_id' => 3,
        'course_id' => $faker->numberBetween(1,20),
        'rating_value' => $faker->numberBetween(1,5),
    ];
});
