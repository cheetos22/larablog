<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,4),
        'post_id' => rand(1,10),
        'date' => now(),
        'content' => $faker->paragraph(rand(10,20))
    ];
});
