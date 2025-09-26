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
        $transactionId = 'TXN12345';
        $status = 'success';

        $result = FakePayment::verify($transactionId, $status);

        $this->assertEquals($transactionId, $result['transaction_id']);
        $this->assertEquals($status, $result['status']);
        $this->assertArrayHasKey('message', $result);
    }
}
