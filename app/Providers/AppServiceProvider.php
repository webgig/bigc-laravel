<?php

namespace App\Providers;

use Bigcommerce\Api\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('API_STORE_URL')) {
            Client::configure([
                'store_url' => env('API_STORE_URL'),
                'username' => env('API_USERNAME'),
                'api_key' => env('API_KEY'),
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->bind(
            'App\Repositories\ICustomerRepository',
            'App\Repositories\Impl\BigCCustomerRepository'
        );

        $this->app->bind(
            'App\Repositories\IOrderRepository',
            'App\Repositories\Impl\BigCOrderRepository'
        );


        $this->app->bind(
            'App\Services\ICustomerService',
            'App\Services\Impl\BigCCustomerService'
        );
    }
}
