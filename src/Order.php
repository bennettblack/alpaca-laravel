<?php
namespace bennettblack\alpacalaravel;

use bennettblack\alpacalaravel\Traits\AlpacaRequest;
use Illuminate\Support\Facades\Http;

class Order
{
    use AlpacaRequest;

    private $symbol;
    private $quantity;
    private $time_in_force;
    private $side;
    private $type = 'market';

    /**
     * Begin new order
     */
    public function __construct(String $symbol){

        $this->symbol = $symbol;
    }

    /**
     * Time in Force
     *
     * - Day Order: 'day',
     * - Good Until Cancelled: 'gtc'
     *
     * @return Order
     */
    public function force(String $time){

        $times = ['day', 'gtc'];

        if (!in_array($time, $times))
            throw new \Exception('You must enter a valid time in force.');

        $this->time_in_force = $time;

        return $this;
    }

    /**
     * Specify Buy order
     */
    public function buy(String $quantity){

        $this->side = 'buy';
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Specify Sell order
     */
    public function sell(String $quantity){

        $this->side = 'sell';
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Specify limit price
     */
    public function limit(){

    }

    /**
     * Execute order
     *
     * @param string $sybmol
     *
     * @return Collection
     */
    public function execute(){

        $headers = [
            'APCA-API-KEY-ID' => config('alpaca.paper_key'),
            'APCA-API-SECRET-KEY' => config('alpaca.paper_secret')
        ];

        $body = [
            'symbol'        => $this->symbol,
            'qty'           => $this->quantity,
            'side'          => $this->side,
            'type'          => $this->type,
            'time_in_force' => $this->time_in_force
        ];

        $response = Http::withHeaders($headers)
            ->post(self::endpoint() . config('alpaca.orders_uri'), $body)
            ->collect();

        if($response->has('code'))
            throw new \Exception($response['message']);

        return $response;
    }

}
