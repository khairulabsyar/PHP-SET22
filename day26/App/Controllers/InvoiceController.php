<?php

namespace App\Controllers;

class InvoiceController
{

    public function index(): string
    {
        return 'Invoices';
    }

    // ------ new route
    public function create(): string
    {
        return '<form action="/invoices/create" method="post">
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
