<?php

use Illuminate\Support\Facades\Route;
use FakePayment\Http\Controllers\PaymentController;

Route::get('/fake-payment/redirect', [PaymentController::class, 'redirect'])->name('fakepayment.redirect');
