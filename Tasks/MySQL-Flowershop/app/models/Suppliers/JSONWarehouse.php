<?php

namespace Shop\models\Suppliers;

use Shop\models\Product;
use Shop\models\ProductCollection;

class JSONWarehouse implements Supplier
{
    private ProductCollection $items;

    public function __construct()
    {
        $this->items = new ProductCollection();
        $this->importJSON();
    }

    private function importJSON(): void
    {
        $items = json_decode(
            file_get_contents('storage/flowers.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

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