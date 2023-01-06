<?php

namespace Vikto\ElectricalBillProject\Models;

class Bill
{
    private int $usedKwh;
    private float $oneKwhPrice;
    private string $tariff;
    private float $price;

    public function getUsedKwh(): int
    {
        return $this->usedKwh;
    }

    public function setUsedKwh(int $usedKwh): void
    {
        $this->usedKwh = $usedKwh;
    }

    public function getOneKwhPrice(): float
    {
        return $this->oneKwhPrice;
    }

    public function setOneKwhPrice(float $oneKwhPrice): void
    {
        $this->oneKwhPrice = $oneKwhPrice;
    }

    public function getTariff(): string
    {
        return $this->tariff;
    }

    public function setTariff(string $tariff): void
    {
        $this->tariff = $tariff;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}