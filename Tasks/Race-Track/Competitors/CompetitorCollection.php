<?php

require_once 'FastCompetitor.php';
require_once 'SlowCompetitor.php';

class CompetitorCollection implements IteratorAggregate
{
    private array $collection = [];

    public function add(Competitor $competitor): void
    {
        $this->collection[] = $competitor;
    }

    public function addMany(array $competitors): void
    {
        foreach ($competitors as $competitor) {
            $this->add($competitor);
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
