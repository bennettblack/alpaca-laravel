<?php

namespace bennettblack\alpacalaravel;

use Illuminate\Support\Facades\Http;

class Alpaca{

    /**
     * Get user account.
     *
     * @param string $attribute
     * @param string $value
     *
     * @return Collection
     */
    public static function account(){

        $endpoint = env('ALPACA_PAPER_ENDPOINT');
        $uri = '/v2/account';

        $headers = [
            'APCA-API-KEY-ID' => env('ALPACA_PAPER_KEY'),
            'APCA-API-SECRET-KEY' => env('ALPACA_PAPER_SECRET')
        ];

        $response = Http::withHeaders($headers)->get($endpoint . $uri)->collect();

        return $response;
    }


}
