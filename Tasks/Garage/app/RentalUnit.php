<?php

namespace Garage;

class RentalUnit
{
    /**
     * @var RentalUnitInterface
     */
    private RentalUnitInterface $unit;
    private string $status;
    private int $price;

    public function __construct(RentalUnitInterface $unit, string $status, int $price)
    {
        $this->unit = $unit;
        $this->status = $status;
        $this->price = $price;
    }

    public function unit(): RentalUnitInterface
    {
        return $this->unit;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function price(): int
    {
        return $this->price;
    }
}