<?php

class Gardener implements WarehouseInterface
{
    private array $growingExpenses = [
        'Yellow Tulip' => 150,
        'Red Tulip' => 170,
        'Blue Tulip' => 200,
        'White Rose' => 330,
        'Pink Rose' => 300,
        'Red rose' => 360,
    ];
    private FlowerCollection $flowers;

    public function getFlowers(): FlowerCollection
    {
        $this->setPrice();
        $flowers = $this->flowers;
        $this->flowers->removeFlowers();
        return $flowers;
    }

    public function growFlower(Flower $flower): void
    {
        $this->flowers->setFlower($flower);
    }

    public function growFlowers(array $flowers): void
    {
        foreach ($flowers as $flower) {
            $this->growFlower($flower);
        }
    }

    private function setPrice(): void
    {
        foreach ($this->flowers->getFlowers() as $flower) {
            foreach ($this->growingExpenses as $flow => $growingExpense) {
                if ($flower->getName() === $flow) {
                    $flower->setPrice($growingExpense);
                }
            }
        }
    }
}