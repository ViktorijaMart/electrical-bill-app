<?php

namespace Vikto\ElectricalBillProject\Controllers;

use Vikto\ElectricalBillProject\Container\DIContainer;

class BillController
{
    public function __construct(private readonly DIContainer $container)
    {}

    public function getUnpaidBills(): void
    {
        $billRepository = $this->container->get('Vikto\ElectricalBillProject\Repositories\BillRepository');
        $newBill = $this->getPost();
        $currentMonth = date('n');

        if (!empty($newBill)) {
            $newBillMonth = $this->getMonthOfNewBill();

            switch (true) {
                case $newBillMonth < $currentMonth:
                    throw new \Exception('You are late to pay this bill by n days');
                case $newBillMonth > $currentMonth:
                    throw new \Exception('This payment is too yearly');
                default:
                    $this->register($newBill);
                    break;
            }
        }

        $daytimeUnpaidBills = $billRepository->getDaytimeUnpaidBills();
        $nighttimeUnpaidBills = $billRepository->getNighttimeUnpaidBills();

        require __DIR__ . '/../../views/electricalBills/unpaidBills.php';
    }

    private function getPost(): array
    {

        // Spaudzint 'GO TO PAYMENT' nuoroda meta error
//        if(empty($_POST['usedKwh']) || empty($_POST['priceOfOneKwh']) || empty($_POST['month'])) {
//            throw new \Exception('Please fill in empty fields');
//        }

        return $_POST;
    }

    private function getMonthOfNewBill(): int
    {
        $newBill = $this->getPost();
        $newBillDate = $newBill['month'];

        return (int)substr($newBillDate, -2, 2);
    }

    private function register(array $newBill): void
    {
        $dayBillRegister = $this->container->get('Vikto\ElectricalBillProject\Repositories\Register\DayBillRegister');
        $nightBillRegister = $this->container->get('Vikto\ElectricalBillProject\Repositories\Register\NightBillRegister');

        switch ($newBill['tariff']) {
            case 'daytime':
                $dayBillRegister->addToJson($newBill);
                break;
            case 'nighttime':
                $nightBillRegister->addToJson($newBill);
                break;
            default:
                throw new \Exception('Incorrect tariff');
        }
    }
}