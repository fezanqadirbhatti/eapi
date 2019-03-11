<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Review::class, function (Faker $faker) {
    return [
        'product_id' => function() {
        return \App\Model\Product::all()->random();
        },
        'user_id' => function() {
            return \App\User::all()->random();
        },
        'review' => $faker->paragraph,
        'star_rating' => $faker->numberBetween(1,5),
    ];
});
