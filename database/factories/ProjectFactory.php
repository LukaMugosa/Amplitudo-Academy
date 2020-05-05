<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Project::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'title' => $faker->word,
        'project_description' => $faker->text(300),
        'deadline' => $faker->date(),
    ];
});
