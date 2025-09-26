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
        $callbackEncoded = $request->query('callback');
        $callback = $callbackEncoded ? base64_decode($callbackEncoded) : null;

        return view('fakepayment::page', compact('txn', 'callback'));
    }

    public function submitPaymentStatus(Request $request)
    {
        $request->validate([
            'txn' => 'required|string',
            'status' => 'required|in:success,failed,timeout',
            'callback' => 'nullable|string',
        ]);

        $txn = $request->input('txn');
        $status = $request->input('status');
        $callbackEncoded = $request->input('callback');
        $callback = $callbackEncoded ? base64_decode($callbackEncoded) : null;

        $result = FakePayment::verify($txn, $status);

        if ($callback) {
            $separator = (parse_url($callback, PHP_URL_QUERY) ? '&' : '?');
            $redirectUrl = $callback . $separator . http_build_query([
                    'txn' => $txn,
                    'status' => $result['status'],
                    'message' => $result['message']
                ]);

            return redirect($redirectUrl);
        }

        return view('fakepayment::result', ['result' => $result]);
    }
}
