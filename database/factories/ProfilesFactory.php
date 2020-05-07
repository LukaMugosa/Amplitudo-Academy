<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
          return [
              'id' => $faker->unique()->numberBetween(5,55),
              'description' => $faker->text(60),
              'education' => $faker->text(30),
              'experience' => $faker->paragraph,
              'address' => $faker->address,
              'phone_number' => $faker->phoneNumber,
              'github_profile_link' => $faker->url,
              'instagram_profile_link' => $faker->url,
              'linkedin_profile_link' => $faker->url,
              'skills' => $faker->text(15)
          ];
});
