<?php

namespace FakePayment;

use Illuminate\Support\ServiceProvider;

class FakePaymentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('fakepayment', function () {
            return new Services\FakePaymentGateway();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/fakepayment.php', 'fakepayment');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/fakepayment.php' => config_path('fakepayment.php')
        ], 'config');


        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'fakepayment');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/fakepayment'),
        ], 'views');
    }
}
