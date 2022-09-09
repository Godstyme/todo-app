<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\PaginatedResourceResponse;
use Illuminate\Pagination\PaginationState;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        // if ($this->app->environment('production')) {
        //     URL::forceScheme('https');
        // }

    }
}
