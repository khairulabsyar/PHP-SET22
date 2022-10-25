<?php

declare(strict_types=1); // from line 18

// global scope
echo 'Global Scope' . "<br/>";
$k = 1;

function bar()
{
    //local scope
    return 'Hello World' . "<br/>";
}

$k = bar();
echo $k;

// to reduce error when php argument is string rather than no
// declare (strict_types =1); // check this
echo 'declare (strict_types =1)' . "<br/>";
function sum($x, $y)
{
    return $x + $y;
}

echo sum(5, 10) . "<br/>";
// php will try to convert if do it like this 
echo sum('5', 38) . "<br/>";

// to make it better

function sume100($x, $y): int
{
    return $x + $y;
}
echo sume100(50, 10) . "<br/>";
echo sume100('39', 10) . "<br/>";

// check 
function sum3(int|float|callable $x, ?int $y): int
{
    return $x + $y;
}

// write a function minimum which takes 2 args and returns the min. Use strict types and type hinting
function minum(int $x, int $y)
{
    // return min($x,$y);
    if ($x < $y) {
        return $x;
    };
    return $y;
}
echo minum(5, 90) . "<br/>";;

// predefined value
function minum2(int $x, int $y = 10)
{
    if ($x < $y) {
        return $x;
    };
    return $y;
}
echo minum2(9) . "<br/>";

// careful when you have predefined but the parameters that need is way behind it
function minum3(int $x, int $y = 50, int $t = 20, bool $status = true)
{
    if ($x < $y) {
        if ($status) {
            return $x;
        }
    };
    return $y;
}
// it will be needed to write like this
echo minum3(30) . "<br/>";

// to make it better, let predefined at the end of the parameters
function minum4(int $x, bool $status, int $y = 10, int $t = 20)
{
    if ($x < $y) {
        return $x;
    };
    return $y;
}
// it will be needed to write like this
echo minum4(8, false, 10, 20) . "<br/>";

// splat operator
echo 'splat operator' . "<br/>";
function kira(int|float ...$numbers): float
{
    return array_sum($numbers);
};
echo kira(5, 3, 4, 6.44, 324.5, 6, 7, 8,) . "<br/>";

//name argument
echo 'name argument' . "<br/>";
function foo(int $x, int $y): int
{
    if ($x % $y === 0) {
        return $x / $y;
    }
    return $x;
};

$x = 6;
$y = 3;
//check this on
echo foo(y: $y, x: $x) . "<br/>";

function sum2(int|float ...$numbers): int
{
    return array_sum($numbers);
};

$x = 'sum2';

if (is_callable($x)) {
    echo $x(100, 222, 333, 444) . "<br/>";
} else {
    echo 'Not callable';
};

// anonymous function
echo 'anonymous function' . "<br/>";
$kira = function (int|float ...$numbers): int {
    return array_sum($numbers);
};

echo $kira(2, 3, 4, 5, 6) . "<br/>";

// to use global variable in anonymous called closure
echo 'to use global variable in anonymous called closure' . "<br/>";
$xyz = 1;
$tolak = function (int|float ...$numbers) use ($xyz): int {
    echo $xyz;
    return array_sum($numbers);
};

echo $tolak(2, 3, 4, 5, 6) . "<br/>";

echo 'going trough array values' . "<br/>";
$arr = [2, 5, 88, 99];

// $arr2 = array_map(function($el){
//     return $el * 25;
// }, $arr);

// or do it like this
$foo = function ($el) {
    return $el * 33;
};

$arr2 = array_map($foo, $arr);

echo '<pre>';
print_r($arr2);
echo '</pre>';

echo 'Working with file systems' . "<br/>";
//
/** 
 * require
 * require_once
 * include
 * include_once
 */

include 'file.php';
// require 'file.php';

// require vs include: include will give warning and continue while require will stop the script and give fatal error

// while for once, if the file has been obtained it will do only once
// include_once 'file.php';
// require_once 'file.php';

// can even use the variable from other file to do something here but it is not advisable
echo 'can even use the variable from other file to do something here but it is not advisable' . "<br/>";
++$abc;
echo $abc . "<br/>";

echo 'Date & Time' . "<br/>";
// Date Time

$currentTime = time();

echo $currentTime . '<br/>';

echo $currentTime + 5 * 24 * 60 * 60 * time() . '<br/>';

echo date('m/d/Y g:ia') . '<br/>';

$unix = strtotime('last day of february 3022');

echo date('m/d/Y g:ia', $unix) . '<br/>';

// Error Handling
echo 'Error Handling' . "<br/>";
error_reporting(0);
error_reporting(E_ALL & ~E_WARNING);
trigger_error('Hey this is just an example, no need to triggered', E_USER_WARNING);

echo 1 . "<br/>";

//custom error
echo 'custom error' . "<br/>";
function errorHandler(
    // required perimeters
    int $type,
    string $msg,
    ?string $file = null,
    ?int $line = null
) {
    echo "{$type}:{$msg} in {$file} on line {$line}";
}

set_error_handler('errorHandler', E_ALL);

echo $x . "<br/>";

// special syntax
echo 'special syntax' . "<br/>";
// return current path file
echo 'return current path file' . "<br/>";
echo __DIR__;
echo "<br/>";
// scan
echo 'scan' . "<br/>";
// . same level director .. parent level directory
$dir = scandir(__DIR__);
echo '<pre>';
var_dump($dir);
echo '</pre>';

// check specific file name
echo 'check specific file name' . "<br/>";
echo $dir[2] . "<br/>";

// to check if it is a file or directory
echo 'to check if it is a file or directory' . "<br/>";
echo '<pre>';
var_dump(is_file($dir[3]));
echo '</pre>';
echo '<pre>';
var_dump(is_dir($dir[3]));
echo '</pre>';
file_exists('foo.text');

// open a file
echo 'open a file';
$txt = 'foo.txt';

echo '<br> your php file is here : ' . __FILE__ . "\r\n";

echo '<br> your text file should exists in : ' . __DIR__ . '/' . $txt . "\r\n";

echo '<br> your text file ' . (file_exists($txt) ? 'exists' : 'not exists') . "\r\n";

echo '<br> your text file is ' . (is_readable($txt) ? 'readable' : 'not readable') . "\r\n";

echo '<br> your text file is ' . (is_writable($txt) ? 'writable' : 'not writable') . "\r\n";

echo '<br> your dir is ' . (is_writable(__DIR__) ?
    'writable, then you can create new files' :
    'not writable, then you can not create any files'
) . "<br/>";

echo 'opening multiple file with different file types' . "<br/>";
$file = fopen('foo.txt', 'r');
$file2 = fopen('expenses.csv', 'r');

echo '<pre>';
var_dump(file_exists('foo.txt'));
var_dump(file_exists('expenses.csv'));
echo '</pre>';

// geting the file
// echo '<pre>';
// var_dump(fgets($file)).'<br/>';
// echo '</pre>';

// closing the file
// fclose($file);

// loop in file
echo 'loop in file' . "<br/>";
while (($line = fgets($file)) !== false) {
    echo $line . '<br/>';
};

// convert line into array
echo 'loop in csv file' . "<br/>";
while (($line = fgetcsv($file2)) !== false) {
    echo '<pre>';
    print_r($line[0]);
    print_r($line[1]);
    print_r($line[2]);
    echo '</pre>';
};