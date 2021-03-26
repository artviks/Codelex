<?php

namespace App;


class Game
{
    private Element $user;
    private Element $computer;
    private array $elements;

    public function __construct(ElementCollection $elements)
    {
        $this->elements = $elements->collection();
    }

    public function getComputer(): Element
    {
        return $this->computer;
    }

    public function getUser(): Element
    {
        return $this->user;
    }

    public function setUser(int $user): void
    {
        $this->user = $this->elements[$user];
    }

    public function getResults(): array
    {
        $this->setComputer();

        $results = [
            $this->user->name(),
            $this->computer->name(),
            'Lost'
        ];

        if ($this->isTie())
        {
           $results[2] = 'Tie';
        }

        if ($this->hasWon())
        {
            $results[2] = 'Won';
        }

        return $results;
    }

    private function setComputer(): void
    {
        $i = random_int(
            0,
            count($this->elements) - 1
        );

        $this->computer = $this->elements[$i];
    }

    private function hasWon(): bool
    {
        return $this->user->wins() === get_class($this->computer);
    }

    private function isTie(): bool
    {
        return $this->user->wins() === $this->computer->wins();
    }
}