<?php

namespace bennettblack\alpacalaravel;

use Illuminate\Support\Facades\Http;

class Alpaca
{
    const ORDERS_URI = '/v2/orders';
    const ACCOUNT_URI = '/v2/account';
    const POSITIONS_URI = '/v2/positions';
    const ASSETS_URI = '/v2/assets/';

    /**
     * DRY? There's gotta be a better way to do this.
     */
    private static function headers(){

        return [
            'APCA-API-KEY-ID' => config('alpaca.paper_key'),
            'APCA-API-SECRET-KEY' => config('alpaca.paper_secret')
        ];
    }

    /**
     * Get user account information.
     *
     * @return Collection
     */
    public function account(){

        $response = Http::withHeaders(self::headers())
            ->get(config('alpaca.paper_endpoint'). self::ACCOUNT_URI)
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

        $uri = $symbol === null ? self::POSITIONS_URI : self::POSITIONS_URI . $symbol;

        $response = Http::withHeaders(self::headers())
            ->get(config('alpaca.paper_endpoint') . $uri)
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
            ->get(config('alpaca.paper_endpoint') . self::ORDERS_URI)
            ->collect();

        return $response;
    }

    /**
     * Get available assets.
     *
     * @param string $sybmol
     *
     * @return Collection
     */
    public function asset($symbol)
    {

        $response = Http::withHeaders(self::headers())
            ->get(config('alpaca.paper_endpoint') . self::ASSETS_URI . $symbol)
            ->collect();

        return $response;
    }

}
