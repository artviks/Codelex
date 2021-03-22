<?php

namespace Shop\controllers;

use Shop\models\Shop;

class ShopController
{

    public function table(Shop $shop): void
    {
        $flowers = $shop->items()->collection();

        require __DIR__ . '.\..\views\shop.view.php';
    }

    public function discount(Shop $shop): void
    {
        $shop->discount();

        $this->table($shop);
    }

}