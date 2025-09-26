<?php

namespace FakePayment\Services;

class FakePaymentGateway
{
    public function pay(int $amount, string $callbackUrl)
    {
        $transactionId = uniqid('txn_');

        $redirect = route('fakepayment.page', [
            'txn' => $transactionId,
            'callback' => base64_encode($callbackUrl)
        ]);

        return [
            'transaction_id' => $transactionId,
            'redirect_url'   => $redirect,
        ];
    }

    public function verify(string $transactionId, ?string $statusFromUser = null)
    {
        $statuses = ['success', 'failed', 'timeout'];

        if ($statusFromUser && in_array($statusFromUser, $statuses)) {
            $status = $statusFromUser;
        } else {
            $status = $statuses[array_rand($statuses)];
        }

        return [
            'transaction_id' => $transactionId,
            'status' => $status,
            'message' => $status === 'success' ? 'Payment successful' : 'Payment failed',
        ];
    }
}
