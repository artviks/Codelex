<?php

require_once 'Competitor.php';

class SlowCompetitor implements Competitor
{
    private string $name;
    private MovingObject $vehicle;
    private bool $isMoving = false;

    public function __construct(string $name, MovingObject $vehicle)
    {
        $this->name = $name;
        $this->vehicle = $vehicle;
    }

    public function isMoving(): bool
    {
        return $this->isMoving;
    }

    public function drive(): void
    {
        $this->isMoving = true;
    }

    public function stop(): void
    {
        $this->isMoving = false;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function vehicle(): MovingObject
    {
        return $this->vehicle;
    }
}