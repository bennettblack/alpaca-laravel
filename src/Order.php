<?php
namespace bennettblack\alpacalaravel;

use Illuminate\Support\Facades\Http;

class Order{

    private $symbol;
    private $quantity;

    function __construct(String $symbol){

        $this->symbol = $symbol;
    }

    /**
     * Add a quantity to an order
     *
     * @param string $sybmol
     *
     * @return Order
     */
    function quantity(String $quantity){

        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Execute order
     *
     * @param string $sybmol
     *
     * @return Collection
     */
    function execute(){

        $uri = '/v2/orders';

        $headers = [
            'APCA-API-KEY-ID' => config('alpaca.paper_key'),
            'APCA-API-SECRET-KEY' => config('alpaca.paper_secret')
        ];

        $body = [
            'symbol'        => $this->symbol,
            'qty'           => $this->quantity,
            'side'          => 'buy',
            'type'          => 'market',
            'time_in_force' => 'day'
        ];

        $response = Http::withHeaders($headers)
            ->post(config('alpaca.paper_endpoint') . $uri, $body)
            ->collect();

        return $response;
        // ^TODO error check for appropriate HTTP Codes from alpaca
        // or just the message?
    }

}
