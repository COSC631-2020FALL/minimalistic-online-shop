<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cart;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    $user_id = App\User::all()->random()->id;
    $order_id = App\Order::all()->random()->id;

    return [
        'user_id' => $user_id,
        'orders_id' => $order_id,
        'quantity' => rand(1, 50)
    ];
});
