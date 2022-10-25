<?php

declare(strict_types=1);

use App\Router;
use App\View;
use App\App;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Exception\ViewNotFoundException;

require __DIR__ . '/../' . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

define('VIEW_PATH', __DIR__ . '/../views');

$router = new Router();

try {
    $router
        ->get('/', [HomeController::class, 'index'])
        ->post('/', [HomeController::class, 'store'])
        ->get('/invoices', [InvoiceController::class, 'index'])
        ->get('/invoices/create', [InvoiceController::class, 'create'])
        ->post('/invoices/create', [InvoiceController::class, 'store']);

    // echo $router
    //     ->resolve(
    //         $_SERVER['REQUEST_URI'],
    //         strtolower($_SERVER['REQUEST_METHOD'])
    //     );

    //refractor
    (new App($router, ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]))->run();
} catch (ViewNotFoundException $e) {
    echo $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . PHP_EOL;
    echo (new View('error/404'))->render();
}