<?php

namespace App\Providers;

//use Illuminate\Contracts\Pagination\Paginator;
//use Illuminate\Pagination\AbstractPaginator;

use Doctrine\DBAL\Schema\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Url;

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
        //
        //Schema::defaultStringLength(191);
        Url::forceScheme('https');
        Paginator::useBootstrap();
    
    }
}
