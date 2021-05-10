<?php

namespace bennettblack\alpacalaravel\Facades;

use Illuminate\Support\Facades\Facade;

class Alpaca extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'alpaca-laravel';
    }
}
