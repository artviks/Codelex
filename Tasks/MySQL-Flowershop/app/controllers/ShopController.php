<?php

namespace Shop\controllers;

use Shop\models\Shop;

class ShopController
{

    public function table($shop): void
    {
        $flowers = $shop->items()->collection();

        require __DIR__ . '.\..\views\shop.view.php';
    }

    public function discount($shop): void
    {
        $shop->discount();

        $this->table($shop);
    }

}