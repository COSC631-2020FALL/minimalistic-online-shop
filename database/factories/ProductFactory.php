<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $owner_id = App\User::all()->random()->id;
    $category_id = App\Category::all()->random()->id;

    return [
        'name' => $faker->name,
        'description' => $faker->realText(120),
        'img_url' => $faker->imageUrl(),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 20),
        'owner_id' => $owner_id,
        'quantity' => rand($min = 1, $max = 50),
        'category_id' => $category_id
    ];
});

