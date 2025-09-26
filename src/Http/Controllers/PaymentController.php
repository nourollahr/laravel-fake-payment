<?php

namespace FakePayment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use FakePayment\Facades\FakePayment;

class PaymentController
{
    public function showPaymentPage(Request $request)
    {
        $txn = $request->query('txn');
        $amount = $request->query('amount');
        $callbackEncoded = $request->query('callback');
        $callback = $callbackEncoded ? base64_decode($callbackEncoded) : null;

        return view('fakepayment::page', compact('txn', 'amount', 'callback'));
    }

    public function submitPaymentStatus(Request $request)
    {
        $request->validate([
            'txn' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|in:success,failed,timeout',
            'callback' => 'nullable|string',
        ]);

        // TODO: in future: get amount from database
        $txn = $request->input('txn');
        $amount = $request->input('amount');
        $status = $request->input('status');
        $callbackEncoded = $request->input('callback');
        $callback = $callbackEncoded ? base64_decode($callbackEncoded) : null;

        $result = FakePayment::verify($txn, $status);

        if ($callback) {
            $separator = (parse_url($callback, PHP_URL_QUERY) ? '&' : '?');
            $redirectUrl = $callback . $separator . http_build_query([
                    'txn' => $txn,
                    'status' => $result['status'],
                    'message' => $result['message'],
                    'amount' => $amount,
                ]);

            return redirect($redirectUrl);
        }

        return view('fakepayment::result', ['result' => $result, 'amount' => $amount]);
    }
}
