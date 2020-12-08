<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create();
        factory(App\User::class)->create(['is_admin' => true, 'name' => 'Tangeni', 'email' => 'tangeni@gmail.com', 'password' => bcrypt('secret')]);
        factory(App\User::class)->create(['is_admin' => true, 'name' => 'Greg', 'email' => 'greg@gmail.com', 'password' => bcrypt('secret')]);
        factory(App\User::class)->create(['is_admin' => true, 'name' => 'Li', 'email' => 'li@gmail.com', 'password' => bcrypt('secret')]);
        factory(App\User::class)->create(['is_admin' => false, 'name' => 'Tangeni', 'email' => 'tangeni2@gmail.com', 'password' => bcrypt('secret')]);
        factory(App\User::class)->create(['is_admin' => false, 'name' => 'Greg', 'email' => 'greg2@gmail.com', 'password' => bcrypt('secret')]);
        factory(App\User::class)->create(['is_admin' => false, 'name' => 'Li', 'email' => 'li2@gmail.com', 'password' => bcrypt('secret')]);
    }
}
