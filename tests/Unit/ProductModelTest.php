<?php

namespace Tests\Unit;

use App\Product;
use App\Review;
use App\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class ProductModelTest extends TestCase
{

    //Checks for orders for a product
    public function test_has_orders() {
        $product = factory(Product::class)->create();
        factory(Order::class)->create([ 'product_id' => $product->id]);
        $orders = $product->orders;
        $this->assertGreaterThanOrEqual(1,$orders->count());
    }

    //Checks for user ownership of product
    public function test_is_owned_by_one_user() {
        $product = Product::all()->random();
        $user    = $product->owner;
        $this->assertNotNull($user);
    }

    //Create product and review, makes sure user exists
    public function test_product_is_reviewed_by_registered_users() {
        $product = factory(Product::class)->create();
        $review = factory(Review::class)->create([ 'product_id' => $product->id ]);  
        $user    = $review->review_owner;
        $this->assertNotNull($user );
    }

}
