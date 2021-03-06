<?php

namespace Shop\models;

class Product
{
    private string $name;
    private int $amount;
    private int $price;

    public function __construct(string $name, int $amount, int $price)
     {
         $this->name = $name;
         $this->amount = $amount;
         $this->price = $price;
     }

    public function name(): string
    {
        return $this->name;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function price(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

}