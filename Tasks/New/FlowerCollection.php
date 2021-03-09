<?php

class FlowerCollection
{
    private array $flowers = [];

    public function flowers(): array
    {
        return $this->flowers;
    }

    public function add(array $flowers): void
    {
        foreach ($flowers as $flower) {
            $this->addOne($flower);
        }
    }

    public function addOne(Flower $flower): void
    {
        $this->flowers[] = $flower;
    }

    public function removeOne(Flower $removedFlower): Flower
    {
        foreach ($this->flowers() as $flower) {
            if ($flower->name() === $removedFlower->name()) {
                $flower->pick($removedFlower->amount());
                $removedFlower->setPrice($flower->price());
            }

        }
        return $removedFlower;
    }

    public function find(Flower $item): ?Flower
    {
        foreach ($this->flowers as $flower) {
            if ($flower->name() === $item->name()) {
                return $flower;
            }
        }
        return null;
    }
}