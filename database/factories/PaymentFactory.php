<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Payment::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(2,4),
        'purpose' => $faker->word,
        'amount' => $faker->randomFloat(1,20,100),
    ];
});
