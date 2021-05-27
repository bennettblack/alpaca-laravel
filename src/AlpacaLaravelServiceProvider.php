<?php

namespace bennettblack\alpacalaravel;

use Illuminate\Support\ServiceProvider;

class AlpacaLaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([

            // Config
            __DIR__ . '/config/alpaca.php' => config_path('alpaca.php'),
        ]);
    }

    public function register()
    {
        // config
        // $this->mergeConfigFrom(__DIR__ . '/config/alpaca.php', 'alpaca');

        // Facade
        $this->app->bind('alpaca-laravel', function () {

            return new Alpaca();
        });
    }
}
