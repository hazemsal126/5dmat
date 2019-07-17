<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //Import Schema

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
        \DB::listen(function ($query) {
            // echo $query->sql . "<br/>";
            // echo implode(',', $query->bindings) . "<br/>";
            // $query->time
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); //Solved by increasing StringLength
        view()->composer('app', 'App\Http\Composers\AppLayoutComposer');
        //
    }
}
