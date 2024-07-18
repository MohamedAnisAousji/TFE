<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use App\Models\Cashier\User;
use App\Models\Client;
use App\Models\Subscription;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cashier::calculateTaxes();
        Cashier::useCustomerModel(Client::class);

    }


}
