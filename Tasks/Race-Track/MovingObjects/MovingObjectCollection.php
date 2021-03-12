<?php

require_once 'Bike.php';
require_once 'Car.php';

class MovingObjectCollection implements IteratorAggregate
{
    private array $collection = [];

    public function add(MovingObject $vehicle): void
    {
        $this->collection[] = $vehicle;
    }

    public function addMany(array $vehicles): void
    {
        foreach ($vehicles as $vehicle) {
            $this->add($vehicle);
        }
    }

    public function size(): int
    {
        return count($this->collection);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->collection);
    }
}