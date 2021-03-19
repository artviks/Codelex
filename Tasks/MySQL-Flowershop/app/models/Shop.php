<?php

namespace Shop\models;

use Shop\models\Suppliers\{CSVWarehouse, DBWarehouse, JSONWarehouse};

class Shop
{
    private const MARKUP = 20;
    private const DISCOUNT = 20;
    private ProductCollection $items;

    public function __construct()
    {
        $this->items = new ProductCollection();
        $this->addSuppliers();

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
    }

    public function items(): ProductCollection
    {
        return $this->items;
    }
}
