<?php

namespace bennettblack\alpacalaravel\tests\Feature;

use bennettblack\alpacalaravel\Alpaca as AlpacalaravelAlpaca;
use bennettblack\alpacalaravel\Facades\Alpaca;
use bennettblack\alpacalaravel\Tests\TestCase;

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
     * Test that account data can be fetched. ^TODO fix this test,
     * unsure what response to expect if there are no account activities.
     * (Ex: new account).
     */
    public function test_can_get_activities_data()
    {
        $data = Alpaca::activities();

        $this->assertTrue($data->count() > 0);
    }


}
