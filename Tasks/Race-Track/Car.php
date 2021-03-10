<?php

require_once 'MovingObject.php';

class Car implements MovingObject
{
    private string $name;
    private array $speed = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function setSpeed(int $min, int $max): void
    {
        $this->speed['min'] = $min;
        $this->speed['max'] = $max;
    }

    public function speed(): int
    {
        return random_int($this->speed['min'], $this->speed['max']);
    }

}