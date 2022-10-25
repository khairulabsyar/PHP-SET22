<?php

namespace App\Class;

// class Home
// {

//     public function index(): string
//     {
//         // 1. use & to add another array value
//         // echo '<pre>';
//         // var_dump($_GET);
//         // echo '</pre>';
//         // echo '<pre>';
//         // var_dump($_POST);
//         // echo '</pre>';

//         // 4. check for super global but wont use much in the future
//         // echo '<pre>';
//         // var_dump($_REQUEST);
//         // echo '</pre>';

//         // original
//         // return 'Home';

//         // 2.  to do post (as an example)
//         // return '<form action="/" method="post">
//         //     <label for="">Amount
//         //         <input type="test" name="amount" placeholder="Input your amount">
//         //     </label>
//         // </form>';

//         // 3. changing the action for get
//         //     return '<form action="/?foo=bar&amount=100" method="post">
//         //     <label for="">Amount</label>
//         //     <input type="test" name="amount" placeholder="Input your amount">
//         // </form>';

//         // 4. Post method to invoice
//         return '<form action="/invoices/create" method="post">
//                 <label for="">Amount
//                     <input type="test" name="amount" placeholder="Input your amount">
//                 </label>
//             </form>';
//     }
// }

// redo 8/9
class Home
{
    public function index(): string
    {
        // return 'Home';

        // inspecting the get, post, request superglobals
        echo '<pre>';
        var_dump($_REQUEST);
        echo '</pre>';

        echo '<pre>';
        var_dump($_GET);
        echo '</pre>';

        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';

        return
            '<form action="/invoices/create" method="post">
                    <label for="amount">Amount</label>
            <input type="text" name="amount"></form>';
    }
}