<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'T-Shirt',
                'type' => 'All t-shirts',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Spotify',
                'type' => 'All spotify',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '3D-Print',
                'type' => 'All 3d-print',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Usedbook',
                'type' => 'All usedbook',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Skateboard',
                'type' => 'All skateboard',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Backpack',
                'type' => 'All backpack',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'iPhone',
                'type' => 'All iphone',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Usedcar',
                'type' => 'All usedbook',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
        ));
        
        
    }
}