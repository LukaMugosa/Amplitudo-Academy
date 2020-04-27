<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'mentor_id' => 2,
        'title' => $faker->name,
        'about_course' => $faker->sentence,
        'description' => $faker->paragraph,
        'price' => $faker->randomNumber(3),
    ];
});
