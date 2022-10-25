<?php

namespace App\Interface;

class DebtCollectionService
{
    public function collectDebt(DebtCollector $collector, $amountOwed) //DebtCollector
    {
        //Polymorphism
        // can pass multiple checks since both CollectionAgency and AhLong are implements the DebtCollector interface
        var_dump($collector instanceof CollectionAgency);
        var_dump($collector instanceof AhLong);
        $collectedAmount = $collector->collect($amountOwed);

        echo "Collected $" . $collectedAmount . " out of $" . $amountOwed . PHP_EOL;
    }

    // this would be considered non-polymorphic since it can only pass the check if an object of CollectionAgency class is passed
    // public function collectDebt(CollectionAgency $collector) //CollectionAgency
    // {
    //     $amountOwed = mt_rand(100, 1000);
    //     $collectedAmount = $collector->collect($amountOwed);
    //     echo 'Collected $ ' . $collectedAmount . ' out of ' . $amountOwed . PHP_EOL;
    // }
}