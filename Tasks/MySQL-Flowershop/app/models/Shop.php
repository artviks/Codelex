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
    }

    public function warehouses(): array
    {
        return $this->warehouses;
    }

    public function items(): ProductCollection
    {
        return $this->items;
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
}
