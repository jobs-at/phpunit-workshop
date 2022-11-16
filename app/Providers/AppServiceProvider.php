<?php

namespace App\Providers;

use App\Services\CreditCardPaymentGateway;
use App\Services\PaymentGateway;
use App\Services\RealTwitter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PaymentGateway::class, CreditCardPaymentGateway::class);
        $this->app->bind('twitter', RealTwitter::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
