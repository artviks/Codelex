<?php

class MovingObjectCollection
{
    private array $collection = [];

    public function add(MovingObject $object): void
    {
        $this->collection[] = $object;
    }

    public function addMany(array $objects): void
    {
        foreach ($objects as $object) {
            $this->add($object);
        }
    }

    public function size(): int
    {
        return count($this->collection);
    }
}