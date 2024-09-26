<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->registerRoutes();
        Paginator::useBootstrap();
    }

    protected function registerRoutes()
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }
}