<?php

namespace bennettblack\alpacalaravel\Tests;

use bennettblack\alpacalaravel\Facades\Alpaca;
use bennettblack\alpacalaravel\AlpacaLaravelServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
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
        // perform environment setup
    }
}
