<?php

namespace App\Exception;

class InvalidAmountException extends \InvalidArgumentException
{
    protected $message = "Invalid invoice amount you added, we need positive amount!";
}
