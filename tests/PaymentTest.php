<?php

namespace Tests;

use FakePayment\Facades\FakePayment;
use Orchestra\Testbench\TestCase;

class PaymentTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return ['FakePayment\\FakePaymentServiceProvider'];
    }

    protected function getPackageAliases($app)
    {
        return ['FakePayment' => 'FakePayment\\Facades\\FakePayment'];
    }

    public function testPaymentProcess()
    {
        $response = FakePayment::pay(10000, 'http://localhost/callback');
        $this->assertArrayHasKey('transaction_id', $response);
        $this->assertArrayHasKey('redirect_url', $response);
    }
}
