<?php

interface MovingObject
{
    public function name(): string;

    public function speed(): int;

    public function addMaxSpeed(int $speed): void;

    public function crashed(): bool;
}