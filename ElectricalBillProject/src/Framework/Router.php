<?php
declare(strict_types=1);

namespace Vikto\ElectricalBillProject\Framework;

use Vikto\ElectricalBillProject\Container\DIContainer;
use Vikto\ElectricalBillProject\Controllers\PageController;

class Router
{
    public function __construct(private readonly DIContainer $container)
    {}

    public function process(string $request)
    {
        /* @var PageController $pageController
        */

        $pageController = $this->container->get('Vikto\ElectricalBillProject\Controllers\PageController');

        switch ($request) {
            case '':
            case '/':
                $pageController->renderRegisterPage();
                break;
            case 'electricalBills/unpaidBills':
                require __DIR__ . '/../../views/electricalBills/unpaidBills.php';
                break;
            default:
                http_response_code(404);
                $pageController->renderNotFoundPage();
        }
    }
}