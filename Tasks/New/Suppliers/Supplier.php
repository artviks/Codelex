<?php

interface Supplier
{
    public function name(): string;

    public function deliverFlower(Flower $flower): Flower;

    public function showStock(): FlowerCollection;
}