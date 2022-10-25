<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

// defining constants for the directories within the project
define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . 'App.php';


// 3. creating a variable containing all transaction 
$hello = openDatabase();

// 4. playing around with date and time
// echo strtotime($hello[0][3]);
// echo date('d m, Y', strtotime($hello[0][3])) . '<br />';

// 5.1 changing dollar sign $ into malaysia ringgit RM
// echo str_replace("$", "RM", $hello[3][3]); found out that some data do not has currency sign
$world = changeCurrency($hello[3]);
// echo '<pre>';
// print_r($world);
// echo '</pre>';

// 6.1 finding total income, total expense, and net income
$money = profitability($hello[3]);

require VIEWS_PATH . 'transactions.php';