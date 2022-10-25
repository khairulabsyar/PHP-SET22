<?php

declare(strict_types=1);

$date = [];
$check = [];
$description = [];
$amount = [];


// 1. getting the csv file and check the data
function openDatabase()
{
    $all = [];
    $database = fopen('../transaction_files/expenses.csv', 'r');
    while (($line = fgetcsv($database)) !== false) {
        $date[] = $line[0];
        $check[] = $line[1];
        $description[] = $line[2];
        $amount[] = $line[3];
    }
    array_push($all, $date, $check, $description, $amount);
    fclose($database);
    return $all;
}

// 2. check the data, check, description and amount. All good!
// $hello = openDatabase();
// echo '<pre>';
// print_r($hello[0]);
// print_r($hello[1]);
// print_r($hello[2]);
// print_r($hello[3]);
// echo '</pre>';

// 5 changing dollar sign $ into malaysia ringgit RM
function changeCurrency(array $currency)
{
    $newCurrency = [];
    $updateC = [];
    // checking pattern if in the value consist of $ or RM [$|RM] and optional $ or RM [$|RM]?
    $pattern = "/[$|RM][$|RM]?/";
    for ($i = 0; $i < count($currency); $i++) {
        // removing any currency symbol
        $newCurrency[] = preg_replace($pattern, "", $currency[$i]);
        if ($newCurrency[$i][0] == '-') {
            // if the first character is minus sign (-), replace it with  "-RM " if not replace with "RM "
            $updateC[] = str_replace('-', "-RM ", $newCurrency[$i]);
        } else {
            $updateC[] = "RM " .  $newCurrency[$i];
        }
    }
    return $updateC;
};

// 6 calculate total income, total expense, and net total
function profitability(array $currency)
{
    // checking pattern if in the value consist of $ or RM [$|RM] and optional $ or RM [$|RM]?
    $pattern = "/[$|RM][$|RM]?/";
    // checking pattern if in the value consist of optional comma , [,]? 
    $pattern2 = "/[,]?/";
    for ($i = 1; $i < count($currency); $i++) {
        // removing both currency and comma in the value
        $removeCurrency[] = preg_replace($pattern, "", $currency[$i]);
        $removeComma[] = preg_replace($pattern2, "",  $removeCurrency[$i - 1]);
        if ($removeComma[$i - 1] < 0) {
            $totalExpense[] = $removeComma[$i - 1];
        } else {
            $totalIncome[] = $removeComma[$i - 1];
        }
    }
    // sum the array and push into new array
    $profit[] = array_sum($totalIncome);
    $expenses[] = array_sum($totalExpense);
    $expenses = str_replace('-', "", $expenses);
    $profit[] = $expenses[0];
    $profit[] = array_sum($removeComma);
    return $profit;
}
