<?php
declare(strict_types=1);

require_once './vendor/autoload.php';

use Vikto\ElectricalBillProject\Container\DIContainer;

$request = str_replace('/PHP_practise_test/ElectricalBillProject', '', $_SERVER['REQUEST_URI']);

// Load custom DI container
$container = new DIContainer();

set_exception_handler(
    function (Exception $e)
    {
        $errorMessage = $e->getMessage();

        require __DIR__ . '/views/index.php';
    }
);

// Use custom Router
$router = $container->get('Vikto\ElectricalBillProject\Framework\Router');
$router->process($request);

// Susiduriau su problema, kad esant exception vartotoja grazina i main page su error message, bet url pasikeicia i unpaidBills page ir nesugalvojau, kaip tai sutvarkyti

