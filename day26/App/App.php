<?php

declare(strict_types=1);

namespace App;

use App\Exception\ViewNotFoundException;
use PDO;

class App
{
    private static PDO $db;

    public function __construct(protected Router $router, protected array $request)
    {
        try {
            static::$db = new PDO(
                'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASS']
            );
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    public static function db(): PDO
    {
        return static::$db;
    }

    public function run()
    {
        try {
            echo $this->router->resolve(
                $this->request['uri'],
                strtolower($this->request['method'])
            );
        } catch (ViewNotFoundException) {
            http_response_code(404);

            echo (new View('error/404'))->render();
        }
    }
}