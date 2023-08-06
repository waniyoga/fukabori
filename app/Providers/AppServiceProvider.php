<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

Use Illuminate\Support\Facades\Schema;

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
    Public function boot(){
        Schema::defaultStringLength(191);
        if (\App::environment(['production'])) {
            \URL::forceScheme('https');
        }
    }
}