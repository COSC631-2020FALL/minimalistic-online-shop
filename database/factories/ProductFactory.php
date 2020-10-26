<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $owner_id = App\User::all()->random()->id;
	$tag_id = App\Tag::all()->random()->id;
	
    return [
        'name' => $faker->name,
        'description' => $faker->realText(255),
        'img_url' => $faker->img_url,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 20),
        'owner_id' => $owner_id,
        'tag_id' => $tag_id,
    ];
});

