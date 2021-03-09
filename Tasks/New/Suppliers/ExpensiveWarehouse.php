<?php

require_once 'Supplier.php';

class ExpensiveWarehouse implements Supplier
{
    private const MARKUP = 10;
    private FlowerCollection $flowers;
    private string $name;

    public function __construct(string $name)
    {
        $this->flowers = new FlowerCollection();
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function buyFlower(Flower $flowers): void
    {
        $this->flowers->addOne($flowers);
        $this->addMarkup();
    }

    public function showStock(): FlowerCollection
    {
        return $this->flowers;
    }

    public function deliverFlower(Flower $flower): Flower
    {
        return $this->flowers->removeOne($flower);
    }

    private function addMarkup(): void
    {
        foreach ($this->flowers->flowers() as $flower) {
            $markup = $flower->price() * (1 + self::MARKUP / 100);
            $flower->setPrice($markup);
        }
    }

}