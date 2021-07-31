<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\MathService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MathService::class, function($app) {
            return new MathService(20);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
