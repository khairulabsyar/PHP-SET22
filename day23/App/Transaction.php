<?php

// class Transaction
// {
//     public float $amount;
//     //to prevent people from changing amount use private
//     // private float $amount;
//     public ?string $description;

//     public function __construct(
//         float $amount,
//         string $description
//     ) {
//         $this->amount = $amount;
//         $this->description = $description;
//     }

//     public function getamount(): float
//     {
//         return $this->amount;
//     }

//     public function addTax(float $rate)
//     {
//         $this->amount += $this->amount * $rate / 100;
//         return $this;
//     }

//     public function addDiscount(float $rate)
//     {
//         $this->amount -= $this->amount * $rate / 100;
//         return $this;
//     }
//     //when reference to the object ends
//     public function __destruct()
//     {
//         echo "Destruct " . $this->description . '<br/>';
//     }
// }

//creating a boiler plate
// class Transaction
// {
//     public function __construct(
//         private float $amount,
//         public ?string $description,
//         private Customer $customer,
//     ) {
//     }
//     public function getCustomer()
//     {
//         return $this->customer;
//     }
// }

// ----- redo on 5/9
// class Transaction{
//     // private float $amount;
//     // private string $desc;

//     // public function __construct(float $amount, string $desc){
//     //     $this->amount = $amount;
//     //     $this->desc = $desc;
//     // }

//     // cleaning up the code from above
//     public function __construct(
//         private float $amount,
//         private ?string $desc = null){}

//     public function getAmount():float{
//         return $this->amount;
//     }

//     public function addTax(float $rate):self{
//         $this->amount += $this->amount* $rate/100;
//         // to make method chaining use return $this
//         return $this;
//     }

//     public function applyDiscount(float $rate):self{
//         $this->amount -= $this->amount* $rate/100;
//         // to make method chaining use return $this
//         return $this;
//     }

//     public function __destruct(){
//         echo "Destruct " . $this->desc . '<br/>';
//     }

// }

// Null safe operator

// class Transaction
// {
//     public function __construct(
//         private float $amount,
//         private string $description,
//         private ?Customer $customer = null
//         // public ?Customer $customer = null,
//     ) {
//     }

//     public function getCustomer(): ?Customer
//     {
//         return $this->customer;
//     }
// }