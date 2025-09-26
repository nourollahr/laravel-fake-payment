# Laravel Fake Payment

<h3> 
    A simple package to simulate a payment gateway in Laravel.
    Ideal for testing projects without using a real payment gateway.
</h3>

## Installation
```bash
composer require nourollahr/laravel-fake-payment
```

## Publish Config and Views (Optional)

#### You can publish the config and views to customize the package behavior and appearance:

```bash
# Publish config
php artisan vendor:publish --provider="Nourollahr\FakePayment\FakePaymentServiceProvider" --tag=config

# Publish views
php artisan vendor:publish --provider="Nourollahr\FakePayment\FakePaymentServiceProvider" --tag=views
```

## Usage

### New Payment:

```php
use FakePayment\Facades\FakePayment;

$amount = 10000;

// Optional callback URL. If null, the user will be redirected to the package's result page
$callbackUrl = route('invoices.verify'); // or null

$payment = FakePayment::pay($amount, $callbackUrl);

// Redirect user to the fake payment page
return redirect($payment['redirect_url']);
```
