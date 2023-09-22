<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
        \URL::forceScheme('https');//URLをhttpsに変える
        $this->app['request']->server->set('HTTPS','on');// ぺジネーション
        Paginator::useBootstrap();
    }
}
