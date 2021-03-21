<?php

namespace Shop\controllers;

use Shop\models\Shop;

class PagesController
{
    public function shop(): void
    {
        $flowers = (new Shop)->items()->collection();

        require __DIR__ . '.\..\views\index.view.php';
    }

    public function warehouses():void
    {
        $warehouses = (new Shop)->warehouses();
        require __DIR__ . '.\..\views\warehouses.view.php';
    }
}