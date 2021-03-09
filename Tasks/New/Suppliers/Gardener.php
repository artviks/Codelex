<?php
require_once 'Supplier.php';

class Gardener implements Supplier
{
    private array $growingExpenses = [
        'Yellow Tulip' => 150,
        'Red Tulip' => 170,
        'Blue Tulip' => 200,
        'White Rose' => 330,
        'Pink Rose' => 300,
        'Red Rose' => 360,
    ];
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

    public function grow(array $flowers): void
    {
        $this->flowers->add($flowers);
        $this->setPrice();
    }

    public function showStock(): FlowerCollection
    {
        return $this->flowers;
    }

    public function deliverFlower(Flower $flower): Flower
    {
        return $this->flowers->removeOne($flower);
    }

    private function setPrice(): void
    {
        foreach ($this->flowers->flowers() as $flower) {
            $flower->setPrice($this->growingExpenses[$flower->name()]);
        }
    }
}