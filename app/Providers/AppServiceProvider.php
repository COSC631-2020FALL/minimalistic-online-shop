<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('isowner', function ($product) {
            return $product->owner->id === Auth::user()->id;
        });

        Blade::if('isadmin', function () {
            return Auth::user()->is_admin === 1;
        });

		Schema::defaultStringLength(191);

    }
}
