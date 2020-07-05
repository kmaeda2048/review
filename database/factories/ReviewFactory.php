<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    $body = $faker->text;
    return [
        'user_id' => mt_rand(1, 50),
        'title' => $faker->sentence,
        'body' => $body,
        'beginning_text' => mb_substr($body, 0, 80),
    ];
});
