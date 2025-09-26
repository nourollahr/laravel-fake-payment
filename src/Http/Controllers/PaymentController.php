<?php

namespace FakePayment\Http\Controllers;

use Illuminate\Http\Request;
use FakePayment\Facades\FakePayment;

class PaymentController
{
    public function redirect(Request $request)
    {
        $txn = $request->get('txn');
        $result = FakePayment::verify($txn);

        return response()->json($result);
    }
}
