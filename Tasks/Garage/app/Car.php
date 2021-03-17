<?php

namespace Garage;

class Car implements RentalUnitInterface
{
    private string $name;
    private string $model;
    private float $fuelConsumption;

    public function __construct(string $name, string $model, float $fuelConsumption)
    {

        $this->name = $name;
        $this->model = $model;
        $this->fuelConsumption = $fuelConsumption;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function fuelConsumption(): float
    {
        return $this->fuelConsumption;
    }

    public function model(): string
    {
        return $this->model;
    }
}
