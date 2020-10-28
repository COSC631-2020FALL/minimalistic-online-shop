<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    $product_id = App\Product::all()->random()->id;
    $order_id   = App\Invoice::all()->random()->id;
    $user_id    = App\Order::all()->random()->id;
    
    return [
        'product_id' => $product_id,
	'invoice_id' => $order_id,
	'user_id'    => $user_id
    ];
});
