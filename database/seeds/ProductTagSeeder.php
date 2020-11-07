<?php

use App\ProductTags;
use Illuminate\Database\Seeder;

class ProdactTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductTags::class, 3);
    }
}
