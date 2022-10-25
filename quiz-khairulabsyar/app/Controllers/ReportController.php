<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\App;
use App\Models\Report;
use App\Models\Expense;

class ReportController
{
    public function index(): View
    {
        $report = new Report();

        return View::make('index', ['arr' => $report->fetchRecords()]);
    }

    public function store(): View
    {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $unfilterExpenses = [];
        $expense = [];

        $reportId = new Report();
        $expenseId = new Expense();

        array_push($unfilterExpenses, $_POST['expense_1'], $_POST['expense_2'], $_POST['expense_3']);

        foreach ($unfilterExpenses as $val) {
            if ($val > 0) {
                $expense[] = $val;
            }
        };

        $db = App::db();

        try {
            $db->beginTransaction();

            $rID = $reportId->create($title, $date);

            $expenseId->create($expense, $rID);

            $db->commit();
        } catch (\Throwable $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            };
        };

        return View::make('index', ['arr' => $reportId->fetchRecords()]);
    }
}