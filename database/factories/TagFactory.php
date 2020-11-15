<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {

    $product_id = App\Product::all()->random()->id;

    return [
        'product_id' => $product_id,
	    'tag_id'     => Tag::all()->random()->id
    ];
});
