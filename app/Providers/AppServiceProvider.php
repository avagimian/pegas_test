<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Infrastructure\Services\CardInfo\BinListClient;
use Infrastructure\Services\CardInfo\CardInfoInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CardInfoInterface::class, BinListClient::class);
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
