<?php

require_once 'Supplier.php';

class Gardener implements Supplier
{
    private FlowerCollection $flowers;

    public function __construct()
    {
        $this->flowers = new FlowerCollection();
    }

    public function grow(array $flowers): void
    {
        $this->flowers->add($flowers);
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