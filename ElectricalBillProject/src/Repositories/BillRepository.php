<?php

namespace Vikto\ElectricalBillProject\Repositories;

use Vikto\ElectricalBillProject\Container\DIContainer;

class BillRepository
{
    private const DAYTIME_JSON_FILE_PATH = __DIR__ . '/../Files/bills/daytimeBills.json';
    private const NIGHTTIME_JSON_FILE_PATH = __DIR__ . '/../Files/bills/nighttimeBills.json';

    public function __construct(private readonly DIContainer $container)
    {}

    public function getDaytimeUnpaidBills(): array
    {
        $billsArray = $this->decodeDaytimeJson();
        $unpaidBillsArray = [];

        foreach ($billsArray as $unpaidBill) {
            if (!$unpaidBill['isPaid']) {
                $unpaidBillObj = $this->container->get('Vikto\ElectricalBillProject\Models\Bill');

                $unpaidBillObj->setUsedKwh($unpaidBill['usedKwh']);
                $unpaidBillObj->setOneKwhPrice($unpaidBill['priceOfOneKwh']);
                $unpaidBillObj->setTariff($unpaidBill['tariff']);
                $unpaidBillObj->setPrice($unpaidBill['usedKwh'] * $unpaidBill['priceOfOneKwh']);

                $unpaidBillsArray[] = $unpaidBillObj;
            }
        }

        return $unpaidBillsArray;
    }

    public function getNighttimeUnpaidBills(): array
    {
        $billsArray = $this->decodeNighttimeJson();
        $unpaidBillsArray = [];

        foreach ($billsArray as $unpaidBill) {
            if (!$unpaidBill['isPaid']) {
                $unpaidBillObj = $this->container->get('Vikto\ElectricalBillProject\Models\Bill');

                $unpaidBillObj->setUsedKwh($unpaidBill['usedKwh']);
                $unpaidBillObj->setOneKwhPrice($unpaidBill['priceOfOneKwh']);
                $unpaidBillObj->setTariff($unpaidBill['tariff']);
                $unpaidBillObj->setPrice($unpaidBill['usedKwh'] * $unpaidBill['priceOfOneKwh']);

                $unpaidBillsArray[] = $unpaidBillObj;
            }
        }

        return $unpaidBillsArray;
    }

    private function decodeDaytimeJson(): array
    {
        return json_decode(file_get_contents(self::DAYTIME_JSON_FILE_PATH), true);
    }

    private function decodeNighttimeJson(): array
    {
        return json_decode(file_get_contents(self::NIGHTTIME_JSON_FILE_PATH), true);
    }
}