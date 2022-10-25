<?php

namespace App\PaymentGateway\eGHL;

// encapsulate, hide the state, properties that people don't want to see
// abstraction, hiding the implementation
// class Transaction
// {
//     private float $amount;

//     public function __construct(float $amount)
//     {
//         $this->amount = $amount;
//     }

//     // getter because the private amount is able to manipulate
//     public function getAmount(): float
//     {
//         return $this->amount;
//     }

//     public function setAmount(float $amount): float
//     {
//         return $this->amount = $amount;
//     }

//     public function process()
//     {
//         echo 'Processing $' . $this->amount . ' transaction';

//         $this->generateReceipt();

//         $this->sendEmail();
//     }

//     // private function, use internally
//     private function generateReceipt()
//     {
//     }
//     private function sendEmail()
//     {
//     }
// }

// ------ redo 7/9
class Transaction
{

    public function __construct(private float $amount)
    {
    }

    // for Encapsulation
    // public function getAmount(): float
    // {
    //     return $this->amount;
    // }

    // public function setAmount(float $amount): float
    // {
    //     return $this->amount = $amount;
    // }

    public function process()
    {
        echo "Processing $" . $this->amount . " transaction";
        $this->generateReceipt();

        $this->sendEmail();
    }

    // methods that are only used internally should be set as private 
    private function generateReceipt()
    {
    }

    private function sendEmail()
    {
    }

    // Accessing Properties from the same class
    public function copyFrom(Transaction $transaction)
    {
        var_dump($transaction->process());
    }
}