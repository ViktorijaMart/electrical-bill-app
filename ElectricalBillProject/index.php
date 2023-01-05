<?php
declare(strict_types=1);

require_once './vendor/autoload.php';

use Vikto\ElectricalBillProject\Container\DIContainer;

$request = str_replace('/PHP_practise_test/ElectricalBillProject', '', $_SERVER['REQUEST_URI']);

// Load custom DI container
$container = new DIContainer();

// Use custom Router

try {
    $router = $container->get('Vikto\ElectricalBillProject\Framework\Router');
    $router->process($request);
} catch (Exception $e) {
    echo $e->getMessage();
}