<?php

namespace bennettblack\alpacalaravel;

use Illuminate\Support\Facades\Http;

class Alpaca{

    /**
     * Get user account information.
     *
     * @return Collection
     */
    public function account(){

        $uri = '/v2/account';

        $headers = [
            'APCA-API-KEY-ID' => config('alpaca.paper_key'),
            'APCA-API-SECRET-KEY' => config('alpaca.paper_secret')
        ];

        $response = Http::withHeaders($headers)
            ->get(config('alpaca.paper_endpoint'). $uri)
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

        $uri = $symbol === null ? '/v2/positions' : '/v2/positions/' . $symbol;

        $headers = [
            'APCA-API-KEY-ID' => config('alpaca.paper_key'),
            'APCA-API-SECRET-KEY' => config('alpaca.paper_secret')
        ];

        $response = Http::withHeaders($headers)
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

        $uri = '/v2/orders';

        $headers = [
            'APCA-API-KEY-ID' => config('alpaca.paper_key'),
            'APCA-API-SECRET-KEY' => config('alpaca.paper_secret')
        ];

        $response = Http::withHeaders($headers)
            ->get(config('alpaca.paper_endpoint') . $uri)
            ->collect();

        return $response;
    }


}
