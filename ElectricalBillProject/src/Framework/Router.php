<?php
declare(strict_types=1);

namespace Vikto\ElectricalBillProject\Framework;

class Router
{
    public function process(string $request)
    {
        switch ($request) {
            case '':
            case '/':
                require __DIR__ . '/../../views/index.php';
                break;
            case 'electricalBills/unpaidBills':
                require __DIR__ . '/../../views/electricalBills/unpaidBills.php';
                break;
            default:
                http_response_code(404);
                require __DIR__ . '/../../views/error/error.php';
        }
    }
}