<?php

use FakePayment\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/fake-payment/page', [PaymentController::class, 'showPaymentPage'])->name('fakepayment.page');
Route::post('/fake-payment/submit', [PaymentController::class, 'submitPaymentStatus'])->name('fakepayment.submit');
