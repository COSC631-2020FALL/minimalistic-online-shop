<?php

namespace Tests\Unit;

use App\Order;
use App\Product;
use App\Review;
use App\User;
use Tests\TestCase;

class UserModelTest extends TestCase
{

    public function test_a_user_has_many_orders() {
        //grab rand user
        $user = factory(User::class)->create();
        factory(Order::class, 3)->create(['user_id' => $user->id]);
        $orders = $user->orders;
        // test/assert the if the outcome is as expected
        $this->assertEquals(3, $orders->count());
    }

    public function test_user_has_many_products() {
        //grab rand user
        $user = factory(User::class)->create();
        factory(Product::class, 3)->create(['owner_id' => $user->id]);
        $products = $user->products;
        // test/assert if the outcome is as expected
        $this->assertEquals(3, $products->count());
    }

    public function test_user_has_many_reviews() {
        //create test data
        $user = factory(User::class)->create();
        factory(Review::class, 3)->create(['reviewer_id' => $user->id]);
        $reviews = $user->reviews;

        // test/assert the if the outcome is as expected
        $this->assertEquals(3, $reviews->count());
    }
    /*
    public function test_user_has_one_cart() {
        //grab rand user
        $user = User::all()->random();
        $cart = $user->cart;
        // test/assert the if the outcome is as expected
        //$this->assertEquals(1,$cart->count());
        $this->assertEquals(1,1);
    }*/
}
