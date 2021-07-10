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
     * Test that activities data can be fetched
     */
    public function test_can_get_activities_data()
    {
        $data = Alpaca::activities();

        $this->assertTrue(array_key_exists('activity_type', $data[0]), 'Do you have any account activities?');
    }

    /**
     * Test that positions data can be fetched
     */
    public function test_can_get_positions_data()
    {
        $data = Alpaca::positions();

        $this->assertTrue(array_key_exists('asset_id', $data[0]), 'Do you have any positions?');
    }

    /**
     * Test that positions data can be fetched for a specific position
     */
    public function test_can_get_specific_position_data()
    {
        $data = Alpaca::positions('F');

        if($data->has('message'))
            $this->assertEquals($data['message'], 'position does not exist');
        else
            $this->assertTrue($data->has('asset_id'));
    }

    /**
     * Test that existing orders can be fetched.
     * ^TODO better way to test this...
     * ^TODO test closed & all order types.
     */
    public function test_can_get_open_orders(){

        $data = Alpaca::orders();

        $this->assertGreaterThan(0, $data->count(), 'Do you have any open orders?');
    }

    /**
     * Test that a particular asset can be fetched
     */
    public function test_can_get_asset(){

        $data = Alpaca::asset('F');

        $this->assertTrue($data->has('id'));
    }

}
