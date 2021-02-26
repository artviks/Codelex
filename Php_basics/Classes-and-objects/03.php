<?php

class FuelGauge
{
    private int $fuel = 0;
    private int $maxCapacity;

    public function __construct(int $maxCapacity)
    {
        $this->maxCapacity = $maxCapacity;
    }

    public function getFuel(): int
    {
        return $this->fuel;
    }

    public function addFuel(): string
    {
        return $this->fuel < $this->maxCapacity ? $this->fuel++ : 'Full';
    }

    public function spendFuel(): string
    {
        return $this->fuel > 0 ? $this->fuel-- : 'Empty';
    }
}

class Odometer
{
    private int $mileage = 0;
    private int $maxMileage = 999999;
    private int $kmPerLiter = 10;
    private FuelGauge $fuelGauge;

    public function __construct(FuelGauge $fuelGauge)
    {

        $this->fuelGauge = $fuelGauge;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function addMileage(): void
    {
        $this->mileage++;
    }

    public function spendFuel(): string
    {
        if ($this->mileage % $this->kmPerLiter === 0) {
            return $this->fuelGauge->spendFuel();
        }
        return '';
    }
}

function fillUp(FuelGauge $fuelGauge, int $amount): void
{
    for ($i = 0; $i < $amount; $i++) {
        if ($fuelGauge->addFuel() === 'Full') {
            break;
        }
    }
}

$fuelGauge = new FuelGauge(70);
fillUp($fuelGauge, 70);

$odometer = new Odometer($fuelGauge);

while ($odometer->spendFuel() !== 'Empty') {
    $odometer->addMileage();

    echo $odometer->getMileage() . ' km, litres left: ' . $fuelGauge->getFuel() . PHP_EOL;
}
