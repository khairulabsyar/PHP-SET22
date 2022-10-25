<?php

namespace App\Models;

use App\App;

class Expense
{

    public function create(array $expense, int $reportID)
    {
        $db = App::db();
        $newExpenseStmt = $db->prepare('INSERT INTO expenses (amount,report_id) VALUE (?,?)');
        for ($i = 0; $i < count($expense); $i++) {
            $newExpenseStmt->execute([$expense[$i], $reportID]);
        };
    }
}
