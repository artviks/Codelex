<?php

class LocalWarehouse implements WarehouseInterface
{
    private const MARKUP = 2;
    private FlowerCollection $flowers;

    public function getFlowers(): FlowerCollection
    {
        $this->addMarkup();
        $flowers = $this->flowers;
        $this->flowers->removeFlowers();
        return $flowers;
    }

    public function buyFlowers(Gardener $gardener): void
    {
        $this->flowers = $gardener->getFlowers();
    }

    private function addMarkup(): void
    {
        foreach ($this->flowers->getFlowers() as $flower) {
            $markup = $flower->getPrice() * (1 + self::MARKUP / 100);
            $flower->setPrice($markup);
        }
    }

}