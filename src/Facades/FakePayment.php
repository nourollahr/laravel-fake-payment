<?php

namespace Nourollahr\FakePayment\Facades;

use Illuminate\Support\Facades\Facade;

class FakePayment extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'fakepayment';
    }
}
