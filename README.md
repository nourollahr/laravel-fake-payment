# Laravel Fake Payment

یک پکیج ساده برای شبیه‌سازی درگاه پرداخت در لاراول.  
مناسب برای تست پروژه‌ها بدون نیاز به درگاه واقعی.

## نصب
```bash
composer require nourollahr/laravel-fake-payment
```

## استفاده
```bash
use FakePayment\Facades\FakePayment;

$payment = FakePayment::pay(10000, 'http://localhost/callback');
// $payment['redirect_url'] -> کاربر رو به صفحه شبیه‌سازی هدایت می‌کنه
```