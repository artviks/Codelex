<?php

class MovingObjectCollection implements IteratorAggregate
{
    private array $collection = [];

    public function add(MovingObject $racer): void
    {
        $this->collection[] = $racer;
    }

    public function addMany(array $racers): void
    {
        foreach ($racers as $racer) {
            $this->add($racer);
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