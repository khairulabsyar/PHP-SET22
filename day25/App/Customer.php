<?php

namespace App;

// class Customer
// {
//     public array $billingInfo = [];

//     public function __construct(array $billingInfo)
//     {
//         $this->billingInfo = $billingInfo;
//     }
// }

class Customer
{

    public function __construct(public array $billingInfo)
    {
    }

    public function getBillingInfo(): array
    {
        return $this->billingInfo;
    }
}
