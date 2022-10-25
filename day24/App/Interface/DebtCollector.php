<?php

namespace App\Interface;

// interface is the blueprint for class
// no curly braces, no implementation
// interface can extends with another interface
// interface DebtCollector extends TestInterface
// interface DebtCollector
// {
//     //must have public
//     public const MY_CONST = 2;

//     // public function __construct();

//     public function collect(float $amountOwed): float;
// }

// redo 7/9
interface DebtCollector extends TestInterface
{
    public const MY_CONST = 2;
    public function __construct();

    public function collect(float $amountOwed): float;
}
