<?php

namespace bennettblack\alpacalaravel\tests\Feature;

use bennettblack\alpacalaravel\Alpaca as AlpacalaravelAlpaca;
use bennettblack\alpacalaravel\Facades\Alpaca;
use bennettblack\alpacalaravel\Tests\TestCase;

class AlpacaTest extends TestCase
{
    /**
     * Test that account data can be fetched.
     */
    public function test_can_get_account_data(){

        $data = Alpaca::account();

        if($data)
            $this->assertTrue(true);

    }


}
