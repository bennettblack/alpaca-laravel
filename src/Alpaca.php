<?php

namespace bennettblack\alpacalaravel;

use bennettblack\alpacalaravel\Traits\AlpacaRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class Alpaca
{
    use AlpacaRequest;

    /**
     * Get user account information.
     */
    public function account(): Collection
    {

        $response = Http::withHeaders(self::headers())
            ->get(self::endpoint() . config('alpaca.account_uri'))
            ->collect();

        return $response;
    }

    /**
     * Get 100 most recent activities
     */
    public function activities(): Collection
    {
        $response = Http::withHeaders(self::headers())
            ->get(self::endpoint() .  config('alpaca.activities_uri'))
            ->collect();

        return $response;
    }

    /**
     * Get users open positions. Optionally pass a symbol for a specific position.
     */
    public function positions(String $symbol = null): Collection
    {
        $uri = $symbol === null ? config('alpaca.positions_uri') : config('alpaca.positions_uri') . '/' . $symbol;

        $response = Http::withHeaders(self::headers())
            ->get(self::endpoint() . $uri)
            ->collect();

        return $response;
    }

    /**
     * Get users orders. $type open, closed, or all
     */
    public function orders(String $type = 'open', String $symbol = null): Collection
    {
        $types = ['open', 'closed', 'all'];

        if (!in_array($type, $types))
            throw new \Exception('You must enter a valid order type.');

        $response = Http::withHeaders(self::headers())
            ->get(self::endpoint() . config('alpaca.orders_uri'), [
                    'status'    => $type,
                    'symbols'   => $symbol
                ])
            ->collect();

        return $response;
    }

    /**
     * Get a particular assets details.
     */
    public function asset(String $symbol): Collection
    {
        $response = Http::withHeaders(self::headers())
            ->get(self::endpoint() . config('alpaca.assets_uri') . '/' . $symbol)
            ->collect();

        return $response;
    }
}
