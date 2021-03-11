<?php

class RaceTrack
{
    private array $track = [];
    private int $length;
    private string $pavement;

    public function __construct(int $length, string $pavement)
    {
        $this->length = $length;
        $this->pavement = $pavement;
    }

    public function show(): array
    {
        return $this->track;
    }

    public function pavement(): string
    {
        return $this->pavement;
    }

    public function length(): int
    {
        return $this->length;
    }

    public function buildTrack(int $participants): void
    {
        for ($r = 0; $r < $participants; $r++) {
            for ($l = 0; $l < $this->length; $l++) {
                $this->track[$r][] = $this->pavement;
            }
        }
    }

    public function setCells(int $row, int $length, string $value): void
    {
        $this->track[$row][$length] = $value;
    }

}