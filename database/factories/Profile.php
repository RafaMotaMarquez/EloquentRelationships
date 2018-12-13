<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomDigit,
        'website_url' => $faker->unique()->safeEmail,
        'github_url' => $faker->unique()->safeEmail,
        'twitter_url' => $faker->unique()->safeEmail,
    ];
});
