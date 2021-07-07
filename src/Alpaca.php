<?php

namespace bennettblack\alpacalaravel;

use bennettblack\alpacalaravel\Traits\AlpacaRequest;
use Illuminate\Support\Facades\Http;

class Alpaca
{
    use AlpacaRequest;

    /**
     * Get user account information.
     *
     * @return Collection
     */
    public function account(){

        $response = Http::withHeaders(self::headers())
            ->get(self::endpoint() . config('alpaca.account_uri'))
            ->collect();

        return $response;
    }

    /**
     * Get 100 most recent activities
     *
     * @return Collection
     */
    public function activities(){

        $response = Http::withHeaders(self::headers())
            ->get(self::endpoint() .  config('alpaca.activities_uri'))
            ->collect();

        return $response;
    }

    /**
     * Get users open positions. Optionally pass a symbol for a specific position.
     *
     * @param string $sybmol
     *
     * @return Collection
     */
    public function positions(String $symbol = null){

        $uri = $symbol === null ? config('alpaca.positions_uri') : config('alpaca.positions_uri') . '/' . $symbol;

        $response = Http::withHeaders(self::headers())
            ->get(self::endpoint() . $uri)
            ->collect();

        return $response;
    }

    /**
     * Get users open orders.
     *
     * @param string $sybmol
     *
     * @return Collection
     */
    public function orders(){

        $response = Http::withHeaders(self::headers())
            ->get(self::endpoint() . config('alpaca.orders_uri'))
            ->collect();

        return $response;
    }

    /**
     * Get a particular assets details.
     *
     * @param string $sybmol
     *
     * @return Collection
     */
    public function asset($symbol){

        $response = Http::withHeaders(self::headers())
            ->get(self::endpoint() . config('alpaca.assets_uri') . '/' .$symbol)
            ->collect();

        return $response;
    }

}
