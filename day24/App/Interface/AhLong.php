<?php

namespace App\Interface;

class AhLong implements DebtCollector
{
    public function __construct()
    {
    }

    public function collect(float $amountOwed): float
    {
        return 0.7 * $amountOwed;
    }
}