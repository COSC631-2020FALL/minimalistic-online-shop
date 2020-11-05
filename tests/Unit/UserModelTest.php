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
}
