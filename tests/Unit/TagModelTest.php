<?php

namespace Tests\Unit;

use App\Product;
use App\ProductTags;
use App\Tag;
use Tests\TestCase;

class TagModelTest extends TestCase
{
    function test_tag_has_many_products()
    {
        // generate data
        $tag = factory(Tag::class)->create();

        $product1 = factory(Product::class)->create();
        $product2 = factory(Product::class)->create();
        $product3 = factory(Product::class)->create();

        factory(ProductTags::class)->create([
            'product_id' => $product1->id,
            'tag_id' => $tag->id
        ]);

        factory(ProductTags::class)->create([
            'product_id' => $product2->id,
            'tag_id' => $tag->id
        ]);

        factory(ProductTags::class)->create([
            'product_id' => $product3->id,
            'tag_id' => $tag->id
        ]);
        // test
        $this->assertGreaterThanOrEqual(3, $tag->products->count());
    }
}
