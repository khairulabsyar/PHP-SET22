<?php

namespace App\Models;

use App\App;

class Report
{
    public function create(string $title, string $date)
    {
        $db = App::db();
        $newReportStmt = $db->prepare('INSERT INTO reports (title,status,date) VALUE (?,?,?)');
        $newReportStmt->execute([$title, 1, $date]);

        $reportId = (int)$db->lastInsertId();

        return $reportId;
    }

    public function fetchRecords()
    {
        $db = App::db();
        $fetchStmt = $db->prepare(
            'SELECT reports.id as report_id ,title, count(expense.amount),sum(expense.amount),date FROM reports INNER JOIN expenses as expense ON expense.report_id = reports.id GROUP BY reports.id'
        );

        $fetchStmt->execute();

        $arr = $fetchStmt->fetchAll();

        return $arr;
    }
}