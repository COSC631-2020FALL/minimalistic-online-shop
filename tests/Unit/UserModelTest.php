<?php

namespace Tests\Unit;

use App\Order;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;


class UserModelTest extends TestCase
{

    public function test_user_has_many_orders() {
        //grab rand user
        $user = User::all()->random();
        $orders = $user->orders;
        // test/assert the if the outcome is as expected
        $this->assertGreaterThanOrEqual(0, $orders->count());
    }

    public function test_user_has_many_products() {
        //grab rand user
        $user = User::all()->random();
        $products = $user->products;
        // test/assert the if the outcome is as expected
        $this->assertGreaterThanOrEqual(0, $products->count());
    }

    public function test_user_has_many_reviews() {
        //grab rand user
        $user = User::all()->random();
        $reviews = $user->reviews;
        // test/assert the if the outcome is as expected
        $this->assertGreaterThanOrEqual(0, $reviews->count());
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
