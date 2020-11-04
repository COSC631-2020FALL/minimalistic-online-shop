<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    $user_id    = App\User::all()->random()->id;
    $product_id = App\Product::all()->random()->id;
    $invoice_id   = App\Invoice::all()->random()->id;

    return [
        'product_id' => $product_id,
	    'invoice_id' => $invoice_id,
	    'user_id'    => $user_id
    ];
});
