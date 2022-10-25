<?php

namespace App\Models;

use App\App;
use PDO;

class Invoice
{
    public function __construct()
    {
    }

    public function create(float $amount, int $userId): int
    {
        $stmt = App::db()->prepare(
            'INSERT INTO invoices (amount, user_id)
                    VALUES (?, ?)'
        );

        $stmt->execute([$amount, $userId]);

        return (int) App::db()->lastInsertId();
    }

    public function find(int $invoiceId): array
    {
        $stmt = App::db()->prepare(
            'SELECT invoices.id, amount, full_name
                FROM invoices
                LEFT JOIN users ON users.id = user_id
                WHERE invoices.id = ?'
        );

        $stmt->execute([$invoiceId]);

        $invoice = $stmt->fetch(PDO::FETCH_ASSOC);

        return $invoice;
    }
}