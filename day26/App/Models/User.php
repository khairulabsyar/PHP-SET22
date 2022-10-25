<?php

declare(strict_types=1);

namespace App\Models;

use App\App;

class User
{
    public function __construct()
    {
    }

    public function create(string $email, string $name, bool $isActive = true): int
    {
        $stmt = App::db()->prepare(
            'INSERT INTO users (email, full_name, is_active, created_at)
                    VALUES (?, ?, ?, now())'
        );

        $stmt->execute([$email, $name, $isActive]);

        return (int) App::db()->lastInsertId();
    }
}