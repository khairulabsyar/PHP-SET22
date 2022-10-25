<?php

namespace App\Exception;

// creating custom exception
class MissingBillingInfoException extends \Exception
{
    protected $message  = "Hello, you are Missing Billing Info";
}
