<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'name'      => $faker->word,
        'category_id'      => function() {
            return \App\Model\Category::all()->random();
        },
        'detail'    => $faker->paragraph,
        'price'     => $faker->numberBetween(10,1000),
        'stock'     => $faker->numberBetween(50,500),
        'discount'  => $faker->numberBetween(1,100),
    ];
});