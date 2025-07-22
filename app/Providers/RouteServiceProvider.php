<?php

namespace App\Providers;

use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();
        $this->routes(function () {
            Route::middleware('api')
                // CHANGE HERE FROM 'api' to 'api/v1'
                ->prefix('api/v1')
                ->group(base_path('routes/api.php'));
 
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
