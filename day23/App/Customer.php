<?php

// class Customer
// {
//     private ?PaymentProfile $paymentProfile = null;

//     public function getPaymentProfile(): ?PaymentProfile
//     {
//         return $this->paymentProfile;
//     }
// }

// after null safe operator 
// class Customer
// {
//     public function __construct(
//         private ?PaymentProfile $paymentProfile
//     ) {
//     }

//     public function getPaymentProfile(): ?PaymentProfile
//     {
//         return $this->paymentProfile;
//     }
// }

// ----- redo 5/9
class Customer
{
    // private ?PaymentProfile $paymentProfile = null;
    // to get it work remove above and use below
    public function __construct(public ?PaymentProfile $paymentProfile = null)
    {
    }

    public function getPaymentProfile(): ?PaymentProfile
    {
        return $this->paymentProfile;
    }

    //    public function __construct(public ?PaymentProfile $paymentProfile = null)
    //    {
    //    }
}
