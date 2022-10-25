<?php

// declare(strict_types=1);

// require __DIR__ . '/../' . 'vendor/autoload.php';

// // ----- Customer Invoice Exception
// $invoice = new App\Invoice(new App\Customer(["no 1" => 50]));

// echo '<pre>';
// var_dump($invoice);
// echo '</pre>';

// try {
//     $invoice->process(20);
// } catch (\App\Exception\MissingBillingInfoException $error) {
//     // check what is inside error
//     // echo '<pre>';
//     // print_r($error);
//     // echo '</pre>';
//     echo $error->getMessage() . ' ' . $error->getFile() . ' ' . $error->getLine() . PHP_EOL;
// } catch (\App\Exception\InvalidAmountException $e) {
//     // check what is inside error
//     // echo '<pre>';
//     // print_r($e);
//     // echo '</pre>';
//     // echo 'Invalid invoice value' . PHP_EOL;
//     echo $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . PHP_EOL;
// } finally {
//     echo 'Finally...' . PHP_EOL;
// }

// // simplify version
// try {
//     $invoice->process(20);
// } catch (\Exception $error) {
//     echo $error->getMessage() . ' ' . $error->getFile() . ' ' . $error->getLine() . PHP_EOL;
// } finally {
//     echo 'Finally...' . PHP_EOL;
// }

// // ----- Router

// // check what is inside our localserver
// echo '<pre>';
// var_dump($_SERVER);
// echo '</pre>';

// $router = new App\Router();

// // home route
// $router->register('/', function () {
//     echo 'Home';
// });

// // invoice route
// $router->register('/invoices', function () {
//     echo 'Invoices';
// });

// echo '<pre>';
// var_dump($router->routes());
// echo '</pre>';

// // taking taking the request_uri to use for resolve
// echo '<pre>';
// var_dump($_SERVER['REQUEST_URI']);
// echo '</pre>';

// // taking the request_uri to use for resolve
// $router
//     ->register('/', [App\Class\Home::class, 'index'])
//     ->register('/invoices', [App\Class\Invoice::class, 'index']);

// echo $router->resolve($_SERVER['REQUEST_URI']);

// // checking for error
// try {
//     $router->resolve($_SERVER['REQUEST_URI']);
// } catch (\Exception $error) {
//     echo $error->getMessage() . ' ' . $error->getFile() . ' ' . $error->getLine();
// }

// // ----- new route
// $router = new App\Router();

// $router
//     ->get('/', [App\Class\Home::class, 'index'])
//     ->get('/invoices', [App\Class\Invoice::class, 'index'])
//     ->get('/invoices/create', [App\Class\Invoice::class, 'create'])
//     ->post('/invoices/create', [App\Class\Invoice::class, 'store']);

// // echo '<pre>';
// // var_dump($_SERVER);
// // echo '</pre>';

// echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

// ----- redo 8/9

declare(strict_types=1);

require __DIR__ . '/../' . 'vendor/autoload.php';

use App\Invoice;
use App\Customer;
use App\Exception\MissingBillingInfoException;
use App\Exception\InvalidAmountException;

// $invoice = new Invoice(new Customer([]));

// $invoice->process(50);

// Catching exceptions
// try {
//     $invoice->process(25);
// } catch (MissingBillingInfoException $e) {
//     echo $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . PHP_EOL;
// }
// // we don't need to have the $e param anymore since php 8// just the exception class is enough
// try {
//     $invoice->process(25);
// } catch (MissingBillingInfoException) {
//     echo 'Some error' . PHP_EOL;
// }
// // multiple try / catch blocks
// try {
//     $invoice->process(-100);
// } catch (MissingBillingInfoException) {
//     echo 'some error' . PHP_EOL;
// } catch (InvalidAmountException) {
//     echo 'Invalid Argument Exception' . PHP_EOL;
// }
// // if the handling logic for two or more exceptions are the same then we can merge them into one catch block and this will catch either exceptions when they occur
// try {
//     $invoice->process(-1);
// } catch (InvalidAmountException | MissingBillingInfoException $e) {
//     echo $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . PHP_EOL;
// }
// // because both exception classes extend from the Exception base class we can specify the base Exception class in the catch block and this will still work the same 
// try {
//     $invoice->process(-25);
// } catch (\Exception $e) {
//     echo $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . PHP_EOL;
// }
// // Finally block
// finally {
//     echo 'Finally block' . PHP_EOL;
// }

// // Global Exception Handler
// // if we define Exception class in the exception handler php built in errors will not be caught that's why we define throwable instead
// set_exception_handler(function (\Throwable $e) {
//     var_dump($e->getMessage());
// });

// // Errors won't be caught if we specify Exception class
// set_exception_handler(function (\Exception $e) {
//     var_dump($e->getMessage());
// });

// array_rand([], 1);

// try {
//     // this will throw a value error which currently won't be caught
//     // instead it will throw a fatal error once it bubbles up through the call stack
//     array_rand([], 1);
// } catch (\Exception $e) {
//     echo $e->getMessage();
// }

// // this will catch both exceptions and errors
// set_exception_handler(function (\Throwable $e) {
//     var_dump($e->getMessage());
// });

// array_rand([], 1);

// Custom exception classes with Static methods
// $invoice = new Invoice(new Customer([]));
// $invoice->process(5);

// Date time (OOP)
// // first arg can be any valid strtotime value
// $dateTime = new DateTime('tomorrow');
// $dateTime = new DateTime('2022/09/03 3:00pm');

// // value printed is a date time object
// var_dump($dateTime);

// // passing the time zone arg
// $dateTime = new DateTime(
//     '2022/09/05',
//     new DateTimeZone('Asia/Kuala_Lumpur')
// );

// var_dump($dateTime);

// // using setTimeZone method
// $dateTime = new DateTime('tomorrow 3pm');
// $dateTime->setTimeZone(new DateTimeZone('Asia/Kuala_Lumpur'));

// // formatting datetime, check PHP Doc
// echo $dateTime->format('d/m/Y g:i A') . PHP_EOL;

// // getting timezone from datetime object
// echo $dateTime->getTimeZone()->getName() . ' ' . $dateTime->format('d/m/Y g:i A') . PHP_EOL;

// // changing date and time (method chaining)
// $dateTime->setDate(2022, 12, 19)->setTime(12, 5);

// echo '<pre>';
// var_dump($dateTime);
// echo '</pre>';

// Create datetime objects from specific formats
// // when PHP sees '/' it assumes that the date is in US date format. '.' or '-' is used for EU date format. If we try to create a date time object from this we will get an error
// echo '<pre>';
// $date = '15/09/2022 3:00PM';

// // $dateTime = new DateTime($date);

// // we can replace the '/' with '-' and this will work. This is an acceptable solution but in cases where we're receiving the date from an api or from a file upload, we cannot be certain of which date format will be provided
// $dateTime = new DateTime(str_replace('/', '-', $date)); // One way to convert
// var_dump($dateTime);

// // createFromFormat static method
// $dateTime = DateTime::createFromFormat('d/m/Y g:iA', $date); // 2nd way to convert

// var_dump($dateTime);

// // we can set the time on a datetime created from the static method
// $date = '15/09/2022';
// $dateTime = DateTime::createFromFormat('d/m/Y', $date)->setTime(13, 50)->setTimezone(new DateTimeZone('Asia/Kuala_Lumpur'));
// print_r($dateTime);
// echo '</pre>';

// Comparing date time objects
// echo '<pre>';
// $dateTime1 = new DateTime('tomorrow 3pm');
// $dateTime2 = new DateTime('5 days ago 11pm');
// var_dump($dateTime1 > $dateTime2);
// var_dump($dateTime1 < $dateTime2);
// var_dump($dateTime1 === $dateTime2);

// // calculate the difference between datetime objects using the diff keyword

// var_dump(($dateTime1->diff($dateTime2)));

// // to get the difference in days
// var_dump($dateTime1->diff($dateTime2)->days);

// // we have access to the format method within the DateInterval class
// var_dump($dateTime1->diff($dateTime2)
//     ->format('%Y years, %m months, %d days, %h hours, %i minutes, %s seconds'));

// // difference in days
// var_dump($dateTime1->diff($dateTime2)->format('%d'));

// // with indicator if +ve/ -ve
// var_dump($dateTime1->diff($dateTime2)->format('%R%a'));

// // using date interval object to add / subtract from a datetime
// $dateTime3 = new DateTime('tomorrow 3pm');
// $dateTime4 = new DateTime('last year 3:01pm');
// var_dump(($dateTime4->diff($dateTime3)));

// // DateInterval class constructor takes in a duration which has to start with 'P' followed by intended duration 3 months, 2 days for example
// $interval = new DateInterval('P3M2D');

// $dateTime3->add($interval);
// var_dump($dateTime3);

// $dateTime4->sub($interval);
// var_dump($dateTime4);
// echo '</pre>';

// // Using DateInterval to add and subtract to a datetime 
// $from = new DateTime();
// $to = (new DateTime())->add(new DateInterval('P3M'));

// echo $from->format('m/d/Y') . ' - ' . $to->format('m/d/Y') . PHP_EOL; // 09/09/2022 - 12/09/2022 

// // the problem with the solution above is that we want the $to variable to always be three month from $from. However, by chaning the code as per below, we will not get the intended result
// $newTo = $from->add(new DateInterval('P3M'));

// // using object cloning
// $newTo = (clone $from)->add(new DateInterval('P3M'));

// echo $newTo->format('m/d/Y'); // 03/09/2023

// Router

// $router = new App\Router();

// $router->register('/', function () {
//     echo 'Home';
// });

// $router->register('/invoices', function () {
//     echo 'Invoices';
// });

// echo $router->resolve($_SERVER['REQUEST_URI']);

// // improving from above
// // we want to be able to call the index method on a class called Homewhen we hit the home page
// $router = new App\Router();
// $router->register('/', [App\Class\Home::class, 'index'])
//     ->register('/invoices', [App\Class\Invoice::class, 'index'])
//     ->register('/invoices/create', [App\Class\Invoice::class, 'create']);

// try {
//     echo $router->resolve($_SERVER['REQUEST_URI']);
// } catch (\Exception $error) {
//     echo $error->getMessage() . ' ' . $error->getFile() . ' ' . $error->getLine();
// }

// // Refactoring routes for $_GET and $_POST Requests
$router = new App\Router();

$router->get('/', [App\Class\Home::class, 'index'])
    ->get('/invoices', [App\Class\Invoice::class, 'index'])
    ->get('/invoices/create', [App\Class\Invoice::class, 'create'])
    ->post('/invoices/create', [App\Class\Invoice::class, 'store']);

// passing the request method as a second arg

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));