<?php

class DisplayFlowerShop
{
    private FlowerShop $shop;

    public function __construct(FlowerShop $shop)
    {
        $this->shop = $shop;
    }

    public function menu(): void
    {
        foreach ($this->shop->available() as $supplier) {
            foreach ($supplier->showStock()->flowers() as $flower) {
                echo $flower->name() . ', price: ' . $flower->price() . ', ' . $flower->amount() . 'pcs' . PHP_EOL;
            }
        }
    }
}