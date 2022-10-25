<?php

declare(strict_types=1);

// // ----------
// require_once '../App/transaction.php';
// require_once '../App/customer.php';
// require_once '../App/paymentProfile.php';

// // instantiate an object from the Transaction class
// // variable = new <= important className, new is to create based on the className
// $transaction = new Transaction(100, 'brekkie');
// $transaction2 = new Transaction(50, 'luncheon');
// echo '<pre>';
// var_dump($transaction);
// var_dump($transaction2);
// echo '</pre>';

// // -> is like . in javascript
// echo $transaction->amount . '<br/>';
// // changing the value
// $transaction->amount = 500;
// echo $transaction->amount . '<br/>';

// // to prevent people from changing the backend
// echo $transaction->getamount() . '<br/>';

// // doing in multiple way and destruct
// $transaction1 = (new Transaction(500, 'makan'))
//     ->addTax(15)
//     ->addDiscount(10)
//     ->getamount();
// $transaction3 = (new Transaction(100, 'dinner'))
//     ->addTax(8)
//     ->addDiscount(10)
//     ->getamount();

// echo '<pre>';
// var_dump($transaction1);
// var_dump($transaction3);
// echo '</pre>';


// // ----------
// //boiler plate
// require_once '../App/Transaction.php';
// require_once '../App/Customer.php';
// require_once '../App/PaymentProfile.php';

// $transaction4 = new Transaction(
//     15,
//     "makanan",
//     new Customer(new PaymentProfile())
// );

// echo '<pre>';
// print_r($transaction4);
// echo '</pre>';

// // null safe operator (->method()?)
// // null coalescing operator (??)
// var_dump($transaction4->getCustomer()->getPaymentProfile()?->id ?? "not a payment profile");

// //change the class (s) so that you're able to print the payment profile id
// echo '<pre>';
// var_dump($transaction4);
// var_dump($transaction4->getCustomer());
// var_dump($transaction4->getCustomer()->getPaymentProfile());
// echo '</pre>';
// // without null safe operator it become like this
// $customer = $transaction4->getCustomer();
// if ($customer) {
//     $paymentProfile = $customer->getPaymentProfile();
//     if ($paymentProfile) {
//         echo $paymentProfile->id;
//     } else {
//         echo 'not a payment profile';
//     }
// }


// // ----------
// require_once '../App/PaymentGateway/eGHL/Transaction.php';
// require_once '../App/PaymentGateway/eGHL/CustomerProfile.php';
// require_once '../App/PaymentGateway/Stripe/Transaction.php';
// require_once "../App/Enums/Status.php";
// // //name spaces, if 2 classes are using the same name, do it like this
// echo '<pre>';
// // var_dump(new Transaction(
// //     15,
// //     "makanan",
// //     new Customer(new PaymentProfile())
// // ));
// // into this
// use App\PaymentGateway\eGHL\Transaction;

// var_dump(new Transaction(
//     15,
//     "makanan",
//     // new Customer(new PaymentProfile())
// ));
// // and this
// var_dump(new App\PaymentGateway\Stripe\Transaction(
//     15,
//     "makanan",
//     // new Customer(new PaymentProfile())
// ));
// echo '</pre>';


// // ----------
// require_once '../App/PaymentGateway/eGHL/Transaction.php';
// require_once '../App/PaymentGateway/eGHL/CustomerProfile.php';
// require_once '../App/PaymentGateway/Stripe/Transaction.php';
// require_once "../App/Enums/Status.php";

// use qualified name 
// use App\PaymentGateway\Stripe\Transaction;

// echo '<pre>';
// var_dump(new Transaction());
// // to access constant (in Stripe) use qualified name
// $transaction = new Transaction();
// $transaction->setStatus(Transaction::STATUS_PAID);
// var_dump($transaction);
// var_dump($transaction::ALL_STATUSES[Transaction::STATUS_PENDING]);
// var_dump($transaction::STATUS_PAID);
// // or access directly like this
// var_dump(Transaction::STATUS_PAID);
// // to check what variable inside a class use qualified name
// var_dump($transaction::class);

// // alias it to make it better
// use PaymentGateway\eGHL\Transaction as eGHLTransaction;

// var_dump(new eGHLTransaction());

// //Exercise
// $transaction = new Transaction();
// var_dump($transaction);
// echo '</pre>';


// // ----------
// Day 24 2/9 autoloader
// require_once '../App/PaymentGateway/eGHL/Transaction.php';
// require_once '../App/PaymentGateway/eGHL/CustomerProfile.php';
// require_once '../App/PaymentGateway/Stripe/Transaction.php';
// require_once "../App/Enums/Status.php";

//no need to use this
// spl_autoload_register(function ($class) {
//     require __DIR__ . '/' . lcfirst(str_replace('\\', '/', $class) . 'php');
//     var_dump($class);
// });

// use App\PaymentGateway\eGHL\Transaction;

// $transaction = new Transaction();

// // use this with autoloader
// require __DIR__ . '/../' . 'vendor/autoload.php';

// $id = new \Ramsey\Uuid\UuidFactory();

// echo $id->uuid4();

// // whenever new code in composer.json, in terminal write composer dump-autoload

// use App\PaymentGateway\eGHL\Transaction;

// $transaction = new Transaction();

// var_dump($transaction);

// ----- redo on 5/9
// require_once '../App/Transaction.php';

// $transaction = new Transaction(15,'Subway');

// // echo '<pre>';
// // // when change to private amount & desc aren't available to access
// // var_dump($transaction->amount);
// // var_dump($transaction->desc);
// // echo '</pre>';
// echo $transaction->getAmount() . '<br/>';
// $transaction->addTax(15)->applyDiscount(5);
// echo $transaction->getAmount(). '<br/>';

// // creating object with variables
// $class = 'Transaction';
// $amount = new $class(10,'brekkie');
// echo $amount->getAmount() . '<br/>';
// $amount->addTax(20)->applyDiscount(15);
// echo $amount->getAmount(). '<br/>';

// // creating multiple object based on the same class
// $transaction1 = (new Transaction(100,"Keychon"))->addTax(20);
// $transaction2 = (new Transaction(100,"Marlbolo"))->applyDiscount(20);
// var_dump($transaction1->getAmount(), $transaction2->getAmount());

// // Destruct
// // scenario 1 -> destructor called first before printing the amount
// $transaction3 = (new Transaction(100,"Makan"))
// ->addTax(8)->applyDiscount(10)->getAmount();
// var_dump($transaction3);
// // Destruct Subway breakfast float(97.2)

// // scenario 2 -> amount printed before destructor is called
// $transaction4 = (new Transaction(100, 'Subway breakfast'))
// ->addTax(8)->applyDiscount(10);
// var_dump($transaction4->getAmount());
// // float(97.2) Destruct Subway breakfast 

// // // scenario 3
// $transaction5 = (new Transaction(100, 'Subway breakfast'))
// ->addTax(8)->applyDiscount(10);
// $amount = $transaction5->getAmount();
// var_dump($amount);
// // float(97.2) Destruct Subway breakfast 

// // // scenario 4
// $transaction6 = (new Transaction(100, 'Subway breakfast'))
// ->addTax(8)->applyDiscount(10);
// unset($transaction6);
// var_dump($transaction6->getAmount());

/* 
* first scenario - reference to the object is terminated once the getAmount() called since getAmount() returns a float. Hence destructor is called first.
* 
* second scenario - reference to object is terminated only at the end of the script. Hence desctructor called last. 
*
* third scenario - even though $amount is assigned the return value of getAmount(), the initial reference to the object still exists. Hence desctructor still called last.
* 
* fourth scenario - unset will call the destructor since the reference to the object no longer exists. 
*/

// STD Class
// $str = '{"a": 1, "b": 2, "c": 3}';
// $arr = json_decode($str); 
// // if we pass true as a second arg, it will return an assoc array
// echo '<pre>';
// print_r($arr);
// echo '</pre>';
// /* returns a PHP StdClass object which we can access 
// stdClass Object
// (
//     [a] => 1
//     [b] => 2
//     [c] => 3
// )
// */
// var_dump($arr->c);

// building an std class
// $obj = new \stdClass();
// // creating and assigning values to properties
// $obj->a=1;
// $obj->b=2;
// var_dump($obj); // object(stdClass)#1 (2) { ["a"]=> int(1) ["b"]=> int(2) }

// Casting to objects
// $arr2 =[1,2,3];
// $obj2 = (object) $arr2;

// echo '<pre>';
// var_dump($obj2);
// echo '</pre>';
// var_dump($obj2); // object(stdClass)#1 (3) { ["0"]=> int(1) ["1"]=> int(2) ["2"]=> int(3) }
// // accessing properties 
// var_dump($obj2->{1}); // int(2)

// Null safe operator is the short form of nested if/else statements
// declare(strict_types=1);

// require_once '../app/Transaction.php';
// require_once '../app/Customer.php';
// require_once '../app/PaymentProfile.php';

// // $transaction = new Transaction(5, 'Test');
// // change to this to get the answer
// $transaction = new Transaction(5, 'Test', new Customer(new PaymentProfile()));

// echo ($transaction->getCustomer()?->getPaymentProfile()?->id ?? 'foo');

// // var_dump($transaction->getCustomer()->getPaymentProfile()->id ?? 'foo');

// Namespace
// require_once '../App/PaymentGateway/Stripe/Transaction.php';
// require_once '../App/PaymentGateway/eGHL/Transaction.php';

// var_dump(new Transaction());

// to use namespace
// require_once '../App/PaymentGateway/Stripe/Transaction.php';
// require_once '../App/PaymentGateway/eGHL/Transaction.php';
// require_once '../App/PaymentGateway/eGHL/CustomerProfile.php';
// //replace above with this (autoloader)
require __DIR__ . '/../' . 'vendor/autoload.php';

// first way of using namespaces
// echo '<pre>';
// var_dump(new App\PaymentGateway\eGHL\Transaction());
// echo '</pre>';

// // // second way is to import namespace using 'use'
// use App\PaymentGateway\Stripe\Transaction;

// // echo '<br />';
// var_dump(new Transaction());

// use Aliasing for Namespaces
// use App\PaymentGateway\eGHL\Transaction;
// use App\PaymentGateway\Stripe\Transaction as StripeTransaction;

// $eGHLTransaction = new Transaction();
// $stripeTransaction = new StripeTransaction();

// echo '<pre>';
// var_dump($eGHLTransaction, $stripeTransaction);
// echo '</pre>';

// constant
use App\PaymentGateway\eGHL\Transaction;

$transaction = new Transaction();

// echo $transaction::STATUS_PENDING . '<br/>';
// echo Transaction::STATUS_PAID . '<br/>';
// echo Transaction::class . '<br/>';

// // $transaction->setStatus('pending'); // this will cause typos
// $transaction->setStatus(Transaction::STATUS_DECLINED);

// echo '<pre>';
// var_dump($transaction);
// echo '</pre>';


// update using ALL_STATUSES and enums
$transaction->setStatus('pending');
echo '<pre>';
var_dump($transaction);
echo '</pre>';
$transaction->setStatus('askdfbakdsfbaksdfbd');