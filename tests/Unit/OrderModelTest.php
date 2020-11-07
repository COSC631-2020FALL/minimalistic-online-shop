<?php

namespace Tests\Unit;

use App\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
class OrderModelTest extends TestCase
{
    //public function test_order_belongs_to_user() {
    //    $order = factory(Order::class)->create();
    //    $this->assertNotNull($order->user);
    //}

    //public function test_order_has_products() {
    //    $order = factory(Order::class)->create();
    //    $this->assertGreaterThanOrEqual(1,$order->products->count());
    //}

    /*uncomment after cart fixed
    public function test_order_belongs_to_cart() {
        $order = factory(Order::class)->create();
        $cart = $order->cart;
        $this->assertNotNull($cart);
    }
    */
}
