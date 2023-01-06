<?php
declare(strict_types=1);

namespace Vikto\ElectricalBillProject\Repositories\Register;

interface BillRegisterInterface
{
    public function addToJson(array $newBill): void;

    public function decodeJson(): array;
}
