<?php

use Illuminate\Database\Seeder;

class ProductOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductOrders::class, 4)->create();
    }
}
