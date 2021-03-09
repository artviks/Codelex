<?php

interface Supplier
{
    public function deliverFlower(Flower $flower): Flower;

    public function showStock(): FlowerCollection;
}