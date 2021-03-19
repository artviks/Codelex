<?php

namespace Shop\models\Suppliers;

use Shop\models\Product;
use Shop\models\ProductCollection;

class DBWarehouse implements Supplier
{
    private ProductCollection $items;

    public function __construct()
    {
        $this->items = new ProductCollection();
        $this->importDB();
    }

    private function importDB(): void
    {
        $db = require 'database/bootstrap.php';
        $items = $db->selectAll('flowers');

        foreach ($items as $item)
        {
            $this->items->addOne(
                new Product($item['name'], $item['amount'], $item['price'])
            );
        }
    }

    public function items(): ProductCollection
    {
        return $this->items;
    }

}