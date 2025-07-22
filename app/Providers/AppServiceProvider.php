<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Components\Services\ApiService\IDolibarrApiService;
use App\Components\Services\ApiService\Impl\DolibarrApiService;

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
        $this->app->singleton(IDolibarrApiService::class, function ($app)
        {
            return new DolibarrApiService;
        });
    }
}
