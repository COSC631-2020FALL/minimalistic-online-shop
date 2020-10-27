<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    $buyer_id = App\User::all()->random()->id;

	
    return [
        'buyer_id' => $buyer_id,
        'total'    => $faker->random()
    ];
});
