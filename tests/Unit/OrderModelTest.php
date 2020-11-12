<?php

namespace Tests\Unit;

use App\Order;
use App\Product;
use App\ProductOrders;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
class OrderModelTest extends TestCase
{
    public function test_order_belongs_to_one_users() {
        $order = factory(Order::class)->create();
        $this->assertNotNull($order->user);
    }

    public function test_order_belongs_to_many_products(){
        // generate data
        $order = factory(Order::class)->create();

        $prod1 = factory(Product::class)->create();
        $prod2 = factory(Product::class)->create();

        factory(ProductOrders::class)->create([
            'order_id' => $order->id,
            'product_id' => $prod1->id
        ]);

        factory(ProductOrders::class)->create([
            'order_id' => $order->id,
            'product_id' => $prod2->id
        ]);

        // test
        $this->assertGreaterThanOrEqual(2, $order->products->count());
    }

}
