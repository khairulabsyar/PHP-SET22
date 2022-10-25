<?php

namespace App\Class;

// class Invoice
// {

//     public function index(): string
//     {
//         return 'Invoices';
//     }

//     // ------ new route
//     public function create(): string
//     {
//         return '<form action="/invoices/create" method="post">
//             <label for="">Amount
//                 <input type="test" name="amount" placeholder="Input your amount">
//             </label>
//         </form>';
//     }

//     public function store()
//     {
//         $amount = $_POST['amount'];
//         var_dump($amount);
//     }
// }

// ----- redo 8/9

class Invoice
{
    public function index(): string
    {
        // return 'Invoice';

        return
            '<form action="/invoices/create" method="post">
            <label for="amount">Amount</label>
            <input type="text" name="amount" placeholder="Input your amount">
        </form>';
    }

    public function create(): string
    {
        // return 'Create Invoice';
        return
            '<form action="/invoices/create" method="post">
                <label for="">Amount
                    <input type="test" name="amount" placeholder="Input your amount">
                </label>
            </form>';
    }

    public function store()
    {
        $amount = $_POST['amount'];
        var_dump($amount);
    }
}