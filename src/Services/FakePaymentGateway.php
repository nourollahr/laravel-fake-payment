<?php

namespace FakePayment\Services;

class FakePaymentGateway
{
    public function pay(int $amount, string $callbackUrl)
    {
        $transactionId = uniqid('txn_');
        return [
            'transaction_id' => $transactionId,
            'redirect_url'   => route('fakepayment.redirect', ['txn' => $transactionId]),
        ];
    }

    public function verify(string $transactionId)
    {
        $statuses = ['success', 'failed', 'timeout'];
        $status = $statuses[array_rand($statuses)];

        return [
            'transaction_id' => $transactionId,
            'status' => $status,
            'message' => $status === 'success' ? 'Payment successful' : 'Payment failed',
        ];
    }
}
