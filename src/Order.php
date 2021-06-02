<?php
namespace bennettblack\alpacalaravel;

use Illuminate\Support\Facades\Http;

class Order{

    private $symbol;
    private $quantity;
    private $time_in_force;
    private $side;

    public function __construct(String $symbol){

        $this->symbol = $symbol;
    }

    /**
     * Add a quantity to an order
     *
     * @return Order
     */
    public function quantity(String $quantity){

        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Time in Force
     *
     * - Day Order: 'day',
     * - Good Until Cancelled: 'gtc'
     *
     * @return Order
     */
    public function force(String $time)
    {

        $times = ['day', 'gtc'];

        if (!in_array($time, $times))
            throw new \Exception('You must enter a valid time in force.');

        $this->time_in_force = $time;

        return $this;
    }

    /**
     * Specify Buy order
     */
    public function buy(){

        $this->side = 'buy';

        return $this;
    }

    /**
     * Specify Sell order
     */
    public function sell()
    {

        $this->side = 'sell';

        return $this;
    }

    /**
     * Execute order
     *
     * @param string $sybmol
     *
     * @return Collection
     */
    public function execute(){

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
            'time_in_force' => $this->time_in_force
        ];

        $response = Http::withHeaders($headers)
            ->post(config('alpaca.paper_endpoint') . $uri, $body)
            ->collect();

        return $response;
        // ^TODO error check for appropriate HTTP Codes from alpaca
        // or just the message?
    }

}
