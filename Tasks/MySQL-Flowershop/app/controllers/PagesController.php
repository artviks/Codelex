<?php

namespace Shop\controllers;

use Shop\models\Shop;

class PagesController
{
    public function home(): void
    {
        require __DIR__ . '.\..\views\index.view.php';
    }

    public function warehouses():void
    {
        $warehouses = (new Shop)->warehouses();

        require __DIR__ . '.\..\views\warehouses.view.php';
    }
}