<?php

require_once 'Supplier.php';

class OtherWarehouse implements Supplier
{
    private FlowerCollection $flowers;

    public function __construct()
    {
        $this->flowers = new FlowerCollection();
    }

    public function buyFlower(Flower $flower): void
    {
        $this->flowers->addOne($flower);
    }

    public function showStock(): FlowerCollection
    {
        return $this->flowers;
    }

    public function deliverFlower(Flower $flower): Flower
    {
        $this->flowers->removeOne($flower);
        return $flower;
    }

}