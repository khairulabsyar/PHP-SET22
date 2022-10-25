<?php

namespace App\Controllers;

use App\View;
use App\App;
use App\Models\User;
use App\Models\Invoice;
use PDO;

// class HomeController
// {
//     public function index(): string
//     {
//         //PDO
//         try {
//             $db = new PDO(
//                 'mysql:host=' . $_ENV['DB_HOST'] . '; dbname=' . $_ENV['DB_DATABASE'],
//                 $_ENV['DB_USER'],
//                 $_ENV['DB_PASS']
//             );
//         } catch (\PDOException $e) {
//             throw new \PDOException($e->getMessage(), $e->getCode());
//         }

//         // not a good practise to do it like this
//         // $email = $_GET['email'];
//         // $name = $_GET['name'];
//         $email = "a@hotmail.com";
//         $name = "hello absyar";
//         $amount = 25;

//         // check the implementaiton of $email | above
//         $query = 'SELECT * FROM users WHERE email ="' . $email . '"';

//         // 2. change the query
//         $query = 'SELECT * FROM users WHERE email = ?';

//         // 3. inserting into database
//         $query = 'INSERT INTO users (email, full_name, is_active, created_at) VALUES (?, ?, ?, ?)';
//         // better and cleaner for bigger inquiry and sequence dont has to be the same when execute()
//         $query = 'INSERT INTO users (email, full_name, is_active, created_at) VALUES (:email, :name, :active, :date)';

//         // method return PDO Statement
//         echo '<pre>';
//         var_dump($db->query($query));
//         echo '</pre>';

//         // 2. remove above & below1 and create a prepare statement
//         $stmt = $db->prepare($query);

//         // the ? in $query will be replace with $email:
//         $stmt->execute([$email]); // return true or false

//         // 3. change the execute
//         $stmt->execute([$email, $name, 1, date('Y-m-d H:m:i', strtotime('now'))]);
//         // better and cleaner for bigger inquiry and sequence dont has to be the same as $query
//         $stmt->execute(
//             [
//                 'email' => $email,
//                 'name' => $name,
//                 'active' => 1,
//                 'date' => date(
//                     'Y-m-d H:m:i',
//                     strtotime('now')
//                 )
//             ]
//         );

//         // 3.5 beginTransaction() & commit() & commit more than 1 db
//         // remove above 3. , 2. , below2
//         try {
//             $db->beginTransaction();

//             $newUserStmt = $db->prepare('INSERT INTO users (email, full_name, is_active, created_at) VALUES (?,?,1,now())');

//             $newInvoiceStmt = $db->prepare('INSERT INTO invoices (amount,user_id) VALUE (:amount,:user_id)');

//             $newUserStmt->execute([$email, $name]);

//             $userId = (int) $db->lastInsertId();

//             $newInvoiceStmt->execute(
//                 [
//                     'user_id' => $userId,
//                     'amount' => $amount
//                 ]
//             );

//             $db->commit();
//         } catch (\Throwable $e) {
//             //test for error
//             if ($db->inTransaction()) {
//                 // pull this out before test for error
//                 $db->rollBack();
//             }
//             // throw new \Exception('testing 123');
//         };

//         // $user = $db->query('SELECT * FROM users WHERE id = ' . $userId)->fetch();
//         // $invoice = $db->query('SELECT * FROM users WHERE id = ' . $invoiceId)->fetch();

//         // to check 
//         $fetchStmt = $db->prepare(
//             'SELECT invoices.id as invoices_id, amount, user_id, full_name
//             FROM invoices 
//             INNER JOIN users 
//             On user_id = users.id 
//             WHERE email =?'
//         );

//         $fetchStmt->execute([$email]);

//         echo '<pre>';
//         var_dump($fetchStmt->fetchAll(PDO::FETCH_ASSOC));
//         echo '</pre>';

//         //below2
//         $userId = $db->lastInsertId();
//         // this will return as object
//         $user = $db->query('SELECT * FROM users WHERE id = ' . $userId)->fetch();

//         var_dump($user);

//         foreach ($stmt->fetchAll() as $user) {
//             echo '<pre>';
//             var_dump($user);
//             echo '</pre>';
//         }

//         // below1
//         // to retrieve all data
//         echo '<pre>';
//         var_dump($db->query($query)->fetchAll(PDO::FETCH_ASSOC));
//         echo '</pre>';

//         // // another way to retrieve all data
//         foreach ($db->query($query)->fetchAll(PDO::FETCH_ASSOC) as $user) {
//             echo '<pre>';
//             var_dump($user);
//             echo '</pre>';
//         }

//         // tp fetch specific column
//         foreach ($db->query($query)->fetchAll(PDO::FETCH_ASSOC) as $user) {
//             echo '<pre>';
//             var_dump($user['full_name']);
//             var_dump($user['email']);
//             echo '</pre>';
//         }

//         // creating new a object from View with render method on'index' and return as string
//         return (new View('index'))->render();
//     }

//     public function store()
//     {
//         try {
//             $db = new PDO(
//                 'mysql:host=' . $_ENV['DB_HOST'] . '; dbname=' . $_ENV['DB_DATABASE'],
//                 $_ENV['DB_USER'],
//                 $_ENV['DB_PASS']
//             );
//         } catch (\PDOException $e) {
//             throw new \PDOException($e->getMessage(), $e->getCode());
//         }

//         $email = $_POST['email'];
//         $name = $_POST['name'];
//         $amount = $_POST['amount'];
//         try {
//             $db->beginTransaction();

//             $newUserStmt = $db->prepare('INSERT INTO users (email, full_name, is_active, created_at) VALUES (?,?,1,now())');

//             $newInvoiceStmt = $db->prepare('INSERT INTO invoices (amount,user_id) VALUE (:amount,:user_id)');

//             $newUserStmt->execute([$email, $name]);

//             $userId = (int) $db->lastInsertId();

//             $newInvoiceStmt->execute(
//                 [
//                     'user_id' => $userId,
//                     'amount' => $amount
//                 ]
//             );

//             $fetchStmt = $db->prepare(
//                 'SELECT invoices.id as invoice_id, amount, user_id, full_name
//                         FROM invoices
//                         INNER JOIN users ON user_id = users.id
//                         WHERE email = ?'
//             );

//             $fetchStmt->execute([$email]);

//             echo '<pre>';
//             var_dump($fetchStmt->fetchAll(PDO::FETCH_ASSOC));
//             echo '</pre>';

//             $db->commit();
//         } catch (\Throwable $e) {
//             if ($db->inTransaction()) {
//                 $db->rollBack();
//             }
//         };
//         return (new View('index'))->render();
//     }
// }

// redo 11/9
class HomeController
{
    public function index(): string
    {
        // second
        // // this exposes the dsn if credentials are invalid
        // // $db = new PDO('mysql:host=localhost;dbname=set_db', 'root', 'root');

        // // instead we can run it in a try / catch block
        // querying w PDO
        // try {
        //     $db = new PDO(
        //         'mysql:host=localhost;dbname=set_db',
        //         'root',
        //         'root'
        //     );
        // } catch (\PDOException $e) {
        //     throw new \PDOException($e->getMessage(), $e->getCode());
        // }

        // $query = 'SELECT * FROM users';

        // // this method returns an object of pdo statement class which can be used to retrieve the results
        // $stmt = $db->query($query);

        // // we can loop through each 
        // // this returns the results indexed by col name and zero index by num this is the default fetch mode (PDO::FETCH_BOTH) 
        // foreach ($stmt as $user) {
        //     echo '<pre>';
        //     var_dump($user);
        //     echo '</pre>';
        // // }

        // // or we can call the fetchAll() method on the pdo statement object
        // // echo '<pre>';
        // // var_dump($stmt->fetchAll());
        // // echo '</pre>';

        // // SQL Injection: Problem with queries that rely on user input 
        // // get user input
        // $email = $_GET['email'];
        // // adding input to the query
        // $query = 'SELECT * FROM users WHERE email ="' . $email . '"';
        // // this query can be altered by
        // // 1. passing a " in the query param to close off the double quote
        // // 2. ?email=foo@mail.com"+OR+1=1+--+
        // echo $query . '<br />';
        // // this method returns an object of pdo statement class which can be used to retrieve the results
        // foreach ($db->query($query) as $user) {
        //     echo '<pre>';
        //     var_dump($user);
        //     echo '</pre>';
        // }

        // third
        // try {
        //     $db = new PDO(
        //         'mysql:host=localhost;dbname=set_db',
        //         'root',
        //         'root'
        //     );
        // } catch (\PDOException $e) {
        //     throw new \PDOException($e->getMessage(), $e->getCode());
        // }
        // // using prepared statements
        // // however this isn't enough since the sql injection has already occurred
        // // we need to used placeholder or named params to successfully mitigate sql injection attacks
        // $email = $_GET['email'];

        // // SQL query has to be like this "' . $email . '"'
        // $query = 'SELECT * FROM users WHERE email ="' . $email . '"';

        // $stmt = $db->prepare($query);

        // $stmt->execute();

        // foreach ($stmt->fetchAll()  as $user) {
        //     echo '<pre>';
        //     var_dump($user);
        //     echo '</pre>';
        // }

        // forth
        // try {
        //     $db = new PDO(
        //         'mysql:host=localhost;dbname=set_db',
        //         'root',
        //         'root'
        //     );
        // } catch (\PDOException $e) {
        //     throw new \PDOException($e->getMessage(), $e->getCode());
        // }
        // // placeholders
        // $email = $_GET['email'];

        // $query = 'SELECT * FROM users WHERE email = ?';

        // echo $query . '<br />';

        // $stmt = $db->prepare($query);

        // $stmt->execute([$email]);

        // // placeholders for insert
        // $email = 'john@doe.com';
        // $name = 'John Doe';
        // $isActive = 1;
        // $createdAt = date('Y-m-d H:m:i', strtotime('now'));

        // $query = 'INSERT INTO users(email, full_name, is_active, created_at) VALUES (?, ?, ?, ?)';

        // $stmt = $db->prepare($query);

        // $stmt->execute([$email, $name, $isActive, $createdAt]);

        // $id = (int) $db->lastInsertId();

        // $user = $db->query('SELECT * FROM users WHERE id = ' . $id)->fetch();

        // echo '<pre>';
        // var_dump($user);
        // echo '</pre>';

        // // using named params (order doesn't matter)
        // $email = 'johny@bravo.com';
        // $name = 'Johny Bravo';
        // $isActive = 1;
        // $createdAt = date('Y-m-d H:m:i', strtotime('now'));

        // $query = 'INSERT INTO users(email, full_name, is_active, created_at) VALUES (:email, :name, :active, :date)';

        // $stmt = $db->prepare($query);

        // $stmt->execute(
        //     [
        //         'name' => $name,
        //         'email' => $email,
        //         'date' => $createdAt,
        //         'active' => $isActive
        //     ]
        // );

        // $id = (int) $db->lastInsertId();

        // $user = $db->query('SELECT * FROM users WHERE id = ' . $id)->fetch();
        // echo '<pre>';
        // var_dump($user);
        // echo '</pre>';

        // fifth (complete version)
        // try {
        //     // $db = new PDO('mysql:host=localhost;dbname=set_db', 'root', 'root');
        //     // change to environment variables
        //     $db = new PDO(
        //         'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'],
        //         $_ENV['DB_USER'],
        //         $_ENV['DB_PASS']
        //     );
        // } catch (\PDOException $e) {
        //     throw new \PDOException($e->getMessage(), (int) $e->getCode());
        // }

        // // change to 
        // $email = 'tom@cruise.com';
        // $name = 'Tom Cruise';
        // $amount = 25;

        // // prepare statement for user
        // $newUserStmt = $db->prepare(
        //     'INSERT INTO users (email, full_name, is_active, created_at) VALUE (?,?,1,now())'
        // );

        // // prepare statement for new invoice
        // $newInvoiceStmt = $db->prepare(
        //     'INSERT INTO invoices (amount, user_id) VALUE (?,?)'
        // );

        // // execute user addition
        // $newUserStmt->execute([$email, $name]);

        // // get user id
        // $userId = (int) $db->lastInsertId();

        // // execute invoice addition based on user addition
        // $newInvoiceStmt->execute([$amount, $userId]);

        // //fetching
        // $fetchStmt = $db->prepare(
        //     'SELECT invoices.id as invoice_id, amount, user_id, full_name
        //             FROM invoices
        //             INNER JOIN users ON user_id = users.id
        //             WHERE email = ?'
        // );

        // $fetchStmt->execute([$email]);

        // echo '<pre>';
        // var_dump($fetchStmt->fetchAll(PDO::FETCH_ASSOC));
        // echo '</pre>';

        // first
        // return (new View('index'))->render(); // 1st way

        // alternative with passing params to the view from controller
        // return (new View('index', ['foo' => 'bar']))->render(); // 2nd way

        // alternative check view.php static make and __toString()
        return View::make('index'); // 3rd way
        // return View::make('index', ['foo' => 'bar']); // 4th way

        // exploits when passing variables if we pass the $_GET as a parameter to our View object and pass filePath in the query string, this will result in a new $filePath variable overriding our current variable
        // return (new View('index', $_GET))->render();

        // for the model we might create a new invoice object get the data from the front end and then call a store method on the object with the data
    }

    public function store()
    {
        $db = App::db();

        $userModel = new User();
        $invoiceModel = new Invoice();
        $email = $_POST['email'];
        $name = $_POST['name'];
        $amount = $_POST['amount'];

        $userId = $userModel->create($email, $name);
        $invoiceId = $invoiceModel->create($amount, $userId);

        try {
            $db->beginTransaction();

            $userId = $userModel->create($email, $name);
            $invoiceId = $invoiceModel->create($amount, $userId);

            $db->commit();
        } catch (\Throwable $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }
            // throw new \Exception('testing 123');
        }

        return (new View('index', ['invoice' =>  $invoiceModel->find($invoiceId)]))->render();
    }
}