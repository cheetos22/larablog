<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => $faker->sentence(5),
        'content' => $faker->paragraph(20),
        'date' => now(),
        'type' => 'text',
        'published' => rand(0,1),
        'premium' => rand(0,1),
    ];
});

$factory->state(App\Post::class, 'image', function (Faker $faker) {
    return [
        'content' => null,
        'type' => 'photo',
        'image' => $faker->imageUrl(1200, 800)
    ];
});
