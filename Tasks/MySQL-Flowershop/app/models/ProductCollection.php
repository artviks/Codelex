<?php

namespace Shop\models;

use Shop\models\Product;

class ProductCollection
{
    private array $items = [];

    public function collection(): array
    {
        return $this->items;
    }

    public function addMany(array $items): void
    {
        foreach ($items as $item) {
            $this->addOne($item);
        }
    }

    public function addOne(Product $item): void
    {
        $this->items[] = $item;
    }
}