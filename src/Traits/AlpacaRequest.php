<?php

namespace bennettblack\alpacalaravel\Traits;

trait AlpacaRequest{

    /**
     * Determine whether to return the PAPER or LIVE trading endpoint.
     *
     * @return String
     */
    private static function endpoint(){

        return config('alpaca.live_mode') ? config('alpaca.live_endpoint') : config('alpaca.paper_endpoint');
    }

    /**
     * Determine whether to return the PAPER or LIVE trading request headers.
     *
     * @return Array
     */
    private static function headers()
    {

        return [
            'APCA-API-KEY-ID' => config('alpaca.live_mode') ? config('alpaca.live_key') : config('alpaca.paper_key'),
            'APCA-API-SECRET-KEY' => config('alpaca.live_mode') ? config('alpaca.live_secret') : config('alpaca.paper_secret')
        ];
    }

}
