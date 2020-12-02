<?php

use App\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('user:create', function () {
    $name = $this->ask('Name?');
    $email = $this->ask('Email?');
    $pwd = $this->secret('Password?');
    $user = User::create([
        'name' => $name,
        'email' => $email,
        'password' => bcrypt($pwd),
        'is_admin' => true
    ]);

    $user->save();

    $this->info('Account created for ' . $name);
})->describe('Create an admin user');
