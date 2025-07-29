<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Components\Services\ApiService\IDolibarrApiService;
use App\Components\Services\ApiService\Impl\DolibarrApiService;

use App\Components\Services\Middlelayer\IProductService;
use App\Components\Services\Middlelayer\Impl\ProductService;

use App\Components\Repositories\IProductRepository;
use App\Components\Repositories\Impl\ProductRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(IDolibarrApiService::class, function ($app)
        {
            return new DolibarrApiService;
        });

        $this->app->singleton(IProductService::class, function ($app)
        {
            return new ProductService;
        });

        $this->app->bind(IDolibarrApiService::class, DolibarrApiService::class);
        $this->app->bind(IProductService::class, ProductService::class);

        $this->app->singleton(IProductRepository::class, function ($app) {
            return new ProductRepository;
        });

        $this->app->singleton(IProductRepository::class, function ($app) {
            return new ProductRepository (
                $app->make(IProductRepository::class)
            );
        });   
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
