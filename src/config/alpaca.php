<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alpaca Trading Mode
    |--------------------------------------------------------------------------
    |
    | Differentiate between PAPER and LIVE modes.
    | true = LIVE, false = PAPER
    |
    */
    'live_mode'   => env('ALPACA_LIVE_MODE', false),

    /*
    |--------------------------------------------------------------------------
    | Paper Trading Credentials
    |--------------------------------------------------------------------------
    |
    | These are your Alpaca paper trading API key and secret
    |
    */

    'paper_endpoint'    => env('ALPACA_PAPER_ENDPOINT', 'https://paper-api.alpaca.markets'),
    'paper_key'         => env('ALPACA_PAPER_KEY'),
    'paper_secret'      => env('ALPACA_PAPER_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Live Trading Credentials
    |--------------------------------------------------------------------------
    |
    | These are your Alpaca live trading API key and secret
    |
    */

    'live_endpoint'    => env('ALPACA_LIVE_ENDPOINT', 'https://api.alpaca.markets'),
    'live_key'         => env('ALPACA_LIVE_KEY'),
    'live_secret'      => env('ALPACA_LIVE_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Alpaca API V2 URI's
    |--------------------------------------------------------------------------
    |
    | These are the endpoints defined in the alpaca docs.
    |
    */

    'orders_uri'    => '/v2/orders',
    'account_uri'  => '/v2/account',
    'positions_uri' => '/v2/positions',
    'assets_uri'    => '/v2/assets'
];
