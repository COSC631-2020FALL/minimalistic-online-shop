<?php

namespace Tests\Unit;

use App\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class ReviewModelTest extends TestCase
{
    public function test_review_belongs_to_one_user() {
        $review = Review::all()->random();
        $user = $review->review_owner;
        $this->assertNotNull($user);
    }
    public function test_review_belongs_to_one_product() {
        $review = Review::all()->random();
        $prod = $review->for_product;
        $this->assertNotNull($prod);
    }

}
