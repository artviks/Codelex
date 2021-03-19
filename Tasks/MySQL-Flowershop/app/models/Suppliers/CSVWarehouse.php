<?php

namespace Shop\models\Suppliers;

use Shop\models\Product;
use Shop\models\ProductCollection;

class CSVWarehouse implements Supplier
{
    private ProductCollection $items;

    public function __construct()
    {
        $this->items = new ProductCollection();
        $this->importCSV();
    }

    private function importCSV(): void
    {
        $lines = file('storage/flowers.csv', FILE_IGNORE_NEW_LINES);
        foreach ($lines as $value)
        {
            [$name, $amount, $price] = explode(', ', $value);
            $this->items->addOne(
                new Product($name, $amount, $price)
            );
        }
    }

    public function items(): ProductCollection
    {
        return $this->items;
    }

}