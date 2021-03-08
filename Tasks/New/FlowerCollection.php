<?php

class FlowerCollection
{
    private array $flowers = [];

    public function setFlower(Flower $flower): void
    {
        $this->flowers[] = $flower;
    }

    public function setFlowers(array $flowers): void
    {
        foreach ($flowers as $flower) {
            $this->setFlower($flower);
        }
    }

    public function removeFlowers(): void
    {
        $this->flowers = [];
    }

    public function getFlowers(): array
    {
        return $this->flowers;
    }
}