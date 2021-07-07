<?php

namespace bennettblack\alpacalaravel\Tests;

use bennettblack\alpacalaravel\Facades\Alpaca;
use bennettblack\alpacalaravel\AlpacaLaravelServiceProvider;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected $loadEnvironmentVariables = true;

    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            AlpacaLaravelServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Alpaca' => Alpaca::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {

        $app['config']->set('alpaca.live_mode', false);

        $app['config']->set('alpaca.paper_endpoint', 'https://paper-api.alpaca.markets');
        $app['config']->set('alpaca.paper_key', 'PKW249K1RV2Q2FV6FHPX');
        $app['config']->set('alpaca.paper_secret', 'KftU5n1L3K2zIlAUd7hQVsYJikloE9qTgT3dpyVY');

        $app['config']->set('alpaca.orders_uri', '/v2/orders');
        $app['config']->set('alpaca.account_uri', '/v2/account');
        $app['config']->set('alpaca.positions_uri', '/v2/positions');
        $app['config']->set('alpaca.assets_uri', '/v2/assets');
        $app['config']->set('alpaca.activities_uri', '/v2/account/activities');
    }

    /**
     * Ignore package discovery from.
     *
     * @return array
     */
    public function ignorePackageDiscoveriesFrom()
    {
        return [];
    }
}
