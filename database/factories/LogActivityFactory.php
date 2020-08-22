<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LogActivity;
use Faker\Generator as Faker;

$factory->define(LogActivity::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'message' => $faker->text(),
        'ip_address' => $faker->ipv4,
        'user_agent' => $faker->userAgent
    ];
});
