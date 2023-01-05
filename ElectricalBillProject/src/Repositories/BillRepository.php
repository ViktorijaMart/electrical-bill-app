<?php

namespace Vikto\ElectricalBillProject\Repositories;

class BillRepository
{
    private const JSON_FILE_PATH = __DIR__ . '/../Files/bills.json';

    public function getUnpaidBills(): array
    {
        return $this->decodeJSON();
    }

    private function decodeJSON(): array
    {
        return json_decode(file_get_contents(self::JSON_FILE_PATH), true);
    }
}