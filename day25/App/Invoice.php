<?php

namespace App;

// class Invoice
// {
//     public Customer $customer;

//     public function __construct(Customer $customer)
//     {
//         $this->customer = $customer;
//     }

//     // can be writter like this
//     // public function __construct(public Customer $customer)
//     // {
//     // }

//     public function process(float $amount): void
//     {
//         // \Exception is a class
//         if ($amount <= 0) {
//             throw new \App\Exception\InvalidAmountException();
//         };
//         // create own exception
//         if (empty($this->customer->billingInfo)) {
//             throw new \App\Exception\MissingBillingInfoException();
//         };
//         echo "Processing $" . $amount . ' invoice - ';

//         sleep(2);

//         // to use in browser
//         echo 'OK' . '<br/>';

//         // to use in terminal
//         // echo 'OK' . PHP_EOL;
//     }
// }

// ------ redo 8/9
use App\Exception\InvalidAmountException;
use App\Exception\MissingBillingInfoException;
use App\Exception\InvoiceExceptionStatic;

// class Invoice
// {
//     public function __construct(public Customer $customer)
//     {
//     }

//     public function process(float $amount): void
//     {
//         if ($amount <= 0) {
//             throw new InvalidAmountException;
//         };

//         if (empty($this->customer->billingInfo)) {
//             throw new MissingBillingInfoException;
//         };

//         echo "Processing $" . $amount . " invoice - ";

//         sleep(1);

//         echo 'OK' . PHP_EOL;
//     }
// }

// Custom exception classes with Static methods
class Invoice
{
    public function __construct(public Customer $customer)
    {
    }

    public function process(float $amount): void
    {
        if ($amount <= 0) {
            throw InvoiceExceptionStatic::InvalidAmount();
        }

        if (empty($this->customer->billingInfo)) {
            throw InvoiceExceptionStatic::MissingBillingInfo();
        }

        echo 'Processing $' . $amount . ' invoice - ';

        sleep(1);

        echo 'OK' . PHP_EOL;
    }
}