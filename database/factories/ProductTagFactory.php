<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Product;
use App\ProductTags;
use App\Tag;
use Faker\Generator as Faker;

$factory->define(ProductTags::class, function (Faker $faker) {

    return [
        'product_id' => Product::all()->random()->id,
        'tag_id' => Tag::all()->random()->id
    ];
});
