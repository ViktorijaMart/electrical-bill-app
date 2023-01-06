<?php
declare(strict_types=1);

namespace Vikto\ElectricalBillProject\Repositories\Register;

class NightBillRegister implements BillRegisterInterface
{

    private const JSON_FILE_PATH = __DIR__ . '/../../Files/bills/nighttimeBills.json';

    public function addToJson(array $newBill): void
    {
        $billsArray = $this->decodeJson();

        $newBill['isPaid'] = false;
        $billsArray[] = $newBill;

        file_put_contents(self::JSON_FILE_PATH, json_encode($billsArray));
    }

    public function decodeJson(): array
    {
        return json_decode(file_get_contents(self::JSON_FILE_PATH), true);
    }
}