<?php

class Flower
{
    private string $name;
    private int $amount;
    private int $price;

    public function __construct(string $name, int $amount)
     {
         $this->name = $name;
         $this->amount = $amount;
     }

    public function getName(): string
    {
        return $this->name;
    }
    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
}