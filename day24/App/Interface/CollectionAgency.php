<?php

namespace App\Interface;
// it forces the implement of functions in CollectionAgency
// implements can take more than 1 interface
// class CollectionAgency implements DebtCollector, TestInterface
// class CollectionAgency implements DebtCollector
// {
//     // public function __construct();
//     public function collect(float $amountOwed): float
//     {
//         // Implement collect method
//         $guaranteed = $amountOwed * 0.5;
//         return mt_rand($guaranteed, $amountOwed);
//     }
// };

// redo 7/9
class CollectionAgency implements DebtCollector
{
    // we can't override a const defined in an interface
    // public const MY_CONST = 3; // comment this if use DebtCollector
    public function __construct()
    {
    }

    public function collect(float $amountOwed): float
    {
        // return $amountOwed;
        $guaranteed = $amountOwed * 0.5;

        return mt_rand($guaranteed, $amountOwed);
    }
}