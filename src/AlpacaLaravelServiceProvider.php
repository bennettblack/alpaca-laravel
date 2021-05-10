<?php

namespace bennettblack\alpacalaravel;

use Illuminate\Support\ServiceProvider;

class AlpacaLaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->bind('alpaca-laravel', function () {

            return new Alpaca();
        });
    }
}
