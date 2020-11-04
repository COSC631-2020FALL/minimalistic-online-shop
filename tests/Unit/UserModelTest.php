<?php

namespace Tests\Unit;

use App\Order;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;


class UserModelTest extends TestCase
{

    use RefreshDatabase;

    public function test_user_has_many_orders(){

        // generate data (user orders)
        $user = factory(User::class, 3)->create()->random();
        factory(Order::class, 3)->create(['user_id' => $user->id]);

        // run the function you wanna test
        $orders = $user->orders;

        // test/assert the if the outcome is as expected
        $this->assertGreaterThanOrEqual(3, $orders->count());
    }
}
