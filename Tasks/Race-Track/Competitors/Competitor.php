<?php

interface Competitor
{
    public function isMoving(): bool;

    public function drive(): void;

    public function stop(): void;

    public function name(): string;

    public function vehicle(): MovingObject;
}