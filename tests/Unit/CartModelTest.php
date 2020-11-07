<?php

namespace Tests\Unit;


use App\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class CartModelTest extends TestCase
{
    public function test_exists() {
        $this->assertEquals(1,1);
    }
    /*
    public function test_cart_belongs_to_one_user() {
        $cart = Cart::all()->random();
        $user = $cart->user;
        $this->assertNotNull($user);
    }

    
    public function test_cart_belongs_to_one_order() {
        $cart = Cart::all()->random();
        $order = $cart->order;
        $this->assertNotNull($order);
    }*/

}
