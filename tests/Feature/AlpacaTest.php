<?php

namespace bennettblack\alpacalaravel\tests\Feature;

use bennettblack\alpacalaravel\Alpaca as AlpacalaravelAlpaca;
use bennettblack\alpacalaravel\Facades\Alpaca;
use bennettblack\alpacalaravel\Tests\TestCase;
use Illuminate\Support\Facades\Http;

class AlpacaTest extends TestCase
{
    /**
     * Test that config is in paper mode before beginning tests.
     */
    public function test_in_paper_mode()
    {
        $this->assertFalse(config('alpaca.live_mode'));
    }

    /**
     * Test that account data can be fetched.
     */
    public function test_can_get_account_data()
    {
        $data = Alpaca::account();

        $this->assertTrue($data->has('id'));
    }

    /**
     * Test that account data can be fetched
     */
    public function test_can_get_activities_data()
    {
        $response = Http::withHeaders(Alpaca::headers())
            ->get(Alpaca::endpoint() . config('alpaca.activities_uri'))
            ->status();

        $this->assertEquals(200, $response);
    }

    /**
     * Test that positions data can be fetched
     */
    public function test_can_get_positions_data()
    {
        $response = Http::withHeaders(Alpaca::headers())
            ->get(Alpaca::endpoint() . config('alpaca.positions_uri'))
            ->status();

        $this->assertEquals(200, $response);
    }

    /**
     * Test that positions data can be fetched for a specific position
     */
    public function test_can_get_specific_position_data()
    {
        $response = Http::withHeaders(Alpaca::headers())
            ->get(Alpaca::endpoint() . config('alpaca.positions_uri') . '/WISH');

        if($response['message'])
            $this->assertEquals($response['message'], 'position does not exist');
        else
            $this->assertEquals($response->status(), 200);
    }

}
