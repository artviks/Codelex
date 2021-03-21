<?php

namespace Shop\models;

use Shop\models\Suppliers\{CSVWarehouse, DBWarehouse, JSONWarehouse};

class Shop
{
    private const MARKUP = 20;
    private const DISCOUNT = 20;
    private ProductCollection $items;
    private array $warehouses = [];

    public function __construct()
    {
        $this->items = new ProductCollection();
        $this->addSuppliers();
        $this->addMarkup();
    }

    public function warehouses(): array
    {
        return $this->warehouses;
    }

    public function items(): ProductCollection
    {
        return $this->items;
    }

    public function discount(): void
    {
        if ($_POST['gender'] === "Female")
        {
            $this->addDiscount();
        }
    }

    private function addSuppliers(): void
    {
        $this->items->addMany(
            array_merge(
                (new CSVWarehouse)->items()->collection(),
                (new JSONWarehouse)->items()->collection(),
                (new DBWarehouse)->items()->collection()
            )
        );

        $this->warehouses = [
            CSVWarehouse::class,
            JSONWarehouse::class,
            DBWarehouse::class
        ];
    }

    private function addMarkup(): void
    {
        foreach ($this->items->collection() as $product)
        {
            $product->setPrice($product->price() * (1 + self::MARKUP / 100));
        }
    }

    private function addDiscount(): void
    {
        foreach ($this->items->collection() as $product)
        {
            $product->setPrice($product->price() * (1 - self::DISCOUNT / 100));
        }
    }
}