<?php

namespace FakePayment\Facades;

use Illuminate\Support\Facades\Facade;

class FakePayment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'fakepayment';
    }
}
