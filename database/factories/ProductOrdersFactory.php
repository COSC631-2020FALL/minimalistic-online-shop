<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Product;
use App\Order;
use App\ProductOrders;
use Faker\Generator as Faker;

$factory->define(ProductOrders::class, function (Faker $faker) {
    return [
        'product_id' => Product::all()->random()->id,
        'order_id' => Order::all()->random()->id
    ];
});
