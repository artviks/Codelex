<?php

namespace Shop\models\Suppliers;

use Shop\models\ProductCollection;

interface Supplier
{
    public function items(): ProductCollection;
}