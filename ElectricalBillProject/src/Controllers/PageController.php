<?php

namespace Vikto\ElectricalBillProject\Controllers;

use Vikto\ElectricalBillProject\Container\DIContainer;

class PageController
{
    public function __construct(private readonly DIContainer $container)
    {}

    public function renderRegisterPage(): void
    {
        $daytimeBillPayment = $this->container->get('Vikto\ElectricalBillProject\Repositories\Pay\DaytimeBillPayment');
        $nighttimeBillPayment = $this->container->get('Vikto\ElectricalBillProject\Repositories\Pay\NighttimeBillPayment');

        if(!empty($_POST)) {
            $daytimeBillPayment->payBills();
            $nighttimeBillPayment->payBills();
        }

        require __DIR__ . '/../../views/index.php';
    }

    public function renderNotFoundPage(): void
    {
        require __DIR__ . '/../../views/error/error.php';
    }
}