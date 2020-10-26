<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
	
    $review_id = App\User::all()->random()->id;
    $product_id =  App\Product::all()->random()->id;

    return [
        //
	'reviewer_id' => $review_id;   
	'product_id'  => $product_id;
	'review'      => $faker-> realText($maxNbChars = 200, $indexSize = 2);
        'rating'      => $faker->random_int(0,5);
    ];
});
