<?php

class FlowerShop
{
    private const DISCOUNT = 20;
    private Flower $order;
    private string $gender = '';
    private array $suppliers;

    public function __construct(array $suppliers)
    {
        $this->addSuppliers($suppliers);
    }

    public function gender(string $gender): void
    {
        $this->gender = $gender;
    }

    public function order(Flower $order): void
    {
        $this->order = $order;
    }

    public function addSupplier(Supplier $supplier): void
    {
        $this->suppliers[] = $supplier;
    }

    public function addSuppliers(array $suppliers): void
    {
        foreach ($suppliers as $supplier) {
            $this->addSupplier($supplier);
        }
    }

    public function available(): array
    {
        return $this->suppliers;
    }

    public function shipOrder(): array
    {

    }
}
