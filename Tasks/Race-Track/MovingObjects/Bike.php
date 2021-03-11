<?php

require_once 'MovingObject.php';

class Bike implements MovingObject
{
    private string $name;
    private int $minSpeed;
    private int $maxSpeed;

    public function __construct(string $name, int $minSpeed, int $maxSpeed)
    {
        $this->name = $name;
        $this->minSpeed = $minSpeed;
        $this->maxSpeed = $maxSpeed;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function speed(): int
    {
        return random_int($this->minSpeed, $this->maxSpeed);
    }

    public function addMaxSpeed(int $speed): void
    {
        $this->maxSpeed += $speed;
    }

}