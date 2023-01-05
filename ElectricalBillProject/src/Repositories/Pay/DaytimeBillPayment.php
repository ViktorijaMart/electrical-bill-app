<?php
declare(strict_types=1);

namespace Vikto\ElectricalBillProject\Repositories\Pay;

class DaytimeBillPayment implements BillPaymentInterface
{
    private const DAYTIME_JSON_FILE_PATH = __DIR__ . '/../../Files/bills/daytimeBills.json';

    public function payBills(): void
    {
        $billsArray = $this->getBillsFromJson();
        $paidBillsArray = [];

        foreach ($billsArray as $bill) {
            if(!$bill['isPaid']) {
                $bill['isPaid'] = true;
            }

            $paidBillsArray[] = $bill;
        }

        file_put_contents(self::DAYTIME_JSON_FILE_PATH, json_encode($paidBillsArray));
    }

    public function getBillsFromJson(): array
    {
        return json_decode(file_get_contents(self::DAYTIME_JSON_FILE_PATH), true);
    }
}
