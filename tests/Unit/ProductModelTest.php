<?php

namespace Tests\Unit;

use App\Product;
use App\Review;
use App\Order;
use App\ProductTags;
use App\Tag;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class ProductModelTest extends TestCase
{

    //Checks for orders for a product
    public function test_product_belongs_to_many_orders() {
        $product = factory(Product::class)->create();
        $orders = factory(Order::class, 3)->create();

        $product->orders()->sync($orders);

        $this->assertEquals(3,$product->orders->count());
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

    public function test_product_belongs_to_many_tags(){
        // generate data
        $product = factory(Product::class)->create();

        $tags = factory(Tag::class, 3)->create();

        $product->tags()->sync($tags);

        // test
        $this->assertGreaterThanOrEqual(3, $product->tags->count());
    }

}
