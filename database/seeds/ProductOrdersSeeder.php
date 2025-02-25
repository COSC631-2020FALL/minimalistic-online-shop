<?php

use App\ProductOrders;
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
        factory(ProductOrders::class, 20)->create();
    }
}
