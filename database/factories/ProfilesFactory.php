<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
          return [
              'id' => $faker->randomNumber(4),
              'description' => $faker->text(60),
              'phone_number' => $faker->phoneNumber,
              'github_profile_link	' => "https://www.fakelink.com",
              'linkedin_profile_link	' => "https://www.fakelink.com",
          ];
});
