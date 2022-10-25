<?php

namespace App\Exception;

class InvoiceExceptionStatic extends \Exception
{
    public static function MissingBillingInfo(): static
    {
        return new static('Missing billing info Static');
    }

    public static function InvalidAmount(): static
    {
        return new static('Invalid amount Static');
    }
}