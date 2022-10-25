<?php

// declare(strict_types=1);

// require __DIR__ . '/../' . 'vendor/autoload.php';

// use App\PaymentGateway\eGHL\Transaction;

// $transaction = new Transaction(25);

// var_dump($transaction);

// $transaction->setAmount(50.5);

// var_dump($transaction->getAmount());

// // cannot do because it is private
// $transaction->sendEmail(); 

// $transaction->process();

// // ------ inheritence
// use App\Toaster;

// $roti = new Toaster();
// // if dont want to use use App\ToasterPro, write like this
// $rotiPro = new \App\ToasterPro;

// $roti->addSlice('Roti Putih');
// $roti->addSlice('Roti Hitam');
// echo '<pre>';
// //unable to use if protected or private
// print_r($roti->slices);
// echo '</pre>';
// $roti->toast();

// $rotiPro->addSlice('RotiPro Masala');
// $rotiPro->addSlice('RotiPro Canai');
// $rotiPro->addSlice('RotiPro Canai Telur');
// $rotiPro->addSlice('RotiPro Papadum');
// echo '<pre>';
// //unable to use if protected or private
// print_r($rotiPro->slices);
// echo '</pre>';
// $rotiPro->toastBagel();

// // ----- interface

// $collector = new \App\CollectionAgency();
// // var_dump($collector->collect(100));

// $service = new \App\DebtCollectionService();
// $service->collectDebt($collector);

// $collector2 = new \App\AhLong();
// $service->collectDebt($collector2);

// ------ redo 7/9

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

// use App\FancyOven;
// use App\PaymentGateway\eGHL\Transaction;

// $transaction = new Transaction(25);

// // instead of allowing for the transaction amount to be modified we can just create a new transaction
// // $transaction = new Transaction(125);
// // or use setter
// $transaction->setAmount(50);

// var_dump($transaction->getAmount());

// $transaction->process();

// // Reflection property - access & modify private properties
// $transaction = new Transaction(25);

// $reflectionProperty = new ReflectionProperty(Transaction::class, 'amount');

// $reflectionProperty->setAccessible(true);

// $reflectionProperty->setValue($transaction, 125);

// var_dump($reflectionProperty->getValue($transaction));

// // Abstraction
// $transaction = new Transaction(125);

// $transaction->process();

// // Accessing Properties from the same class
// $transaction = new Transaction(25);

// $transaction->copyFrom(new Transaction(125));

// // Inheritence
// use App\Toaster;
// use App\ToasterPro;

// $toaster = new Toaster("hello");

// $toaster->addSlice('bread pudding');
// $toaster->addSlice('kaya bread');
// $toaster->addSlice('toasted bread');

// $toaster->toast();

// $toasterPro = new ToasterPro("hello", 5, 5.5);

// $toasterPro->addSlice('white bread');
// $toasterPro->addSlice('hashbrown bread');
// $toasterPro->addSlice('yellow bread');
// $toasterPro->addSlice('red bread');
// $toasterPro->addSlice('bread');

// $toasterPro->toastBagel();

// $FancyOven = new FancyOven(new ToasterPro('hello', 5, 5.5));

// $FancyOven->toast();

// $FancyOven->toastBagel();

// Abstract classes
// $fields = [
//     // new \App\AbstractClass\Field('baseField'), // abstract class
//     new \App\AbstractClass\Text('textFiled'),
//     // new \App\AbstractClass\Boolean('booleanField'), // abstract class
//     new \App\AbstractClass\Checkbox('checkBoxField'),
//     new \App\AbstractClass\Radio('radioField'),
// ];

// foreach ($fields as $field) {
//     echo $field->render() . '</br>';
// };

// Interface
$collector = new \App\Interface\CollectionAgency();

var_dump($collector->collect(100000));

$service = new \App\Interface\DebtCollectionService();

// $service->collectDebt(new \App\Interface\CollectionAgency()) . PHP_EOL;

$amountOwed = mt_rand(100, 1000);

$service->collectDebt(new \App\Interface\AhLong(), $amountOwed);
$service->collectDebt(new \App\Interface\CollectionAgency(), $amountOwed);
