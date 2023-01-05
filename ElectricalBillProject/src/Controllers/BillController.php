<?php

namespace Vikto\ElectricalBillProject\Controllers;

use Vikto\ElectricalBillProject\Container\DIContainer;

class BillController
{
    public function __construct(private readonly DIContainer $container)
    {}

    public function getUnpaidBills(array $newBill): void
    {
        $billRepository = $this->container->get('Vikto\ElectricalBillProject\Repositories\BillRepository');

        // parasyti if, kad patikrinti, ar array not empty, jei not empty, kviesti register funkcija
        if (!empty($newBill)) {
            $this->register($newBill);
        }

        // gauti bill object
        $unpaidBills = $billRepository->getUnpaidBills();

        require __DIR__ . '/../../views/electricalBills/unpaidBills.php';
    }

    private function register(array $newBill): void
    {
        $dayBillRegister = $this->container->get('Vikto\ElectricalBillProject\Repositories\Register\DayBillRegister');

        $dayBillRegister->addToJson($newBill);
    }
}