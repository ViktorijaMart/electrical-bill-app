<?php
declare(strict_types=1);

namespace Vikto\ElectricalBillProject\Repositories\Pay;

interface BillPaymentInterface
{
    public function payBills(): void;

    public function getBillsFromJson(): array;
}