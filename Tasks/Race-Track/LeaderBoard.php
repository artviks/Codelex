<?php

class LeaderBoard
{
    private array $leaderBoard = [];

    public function addFinished(Competitor $competitor, int $time): void
    {
        $this->leaderBoard[$competitor->name()] = $time;
    }

    public function addCrashed(Competitor $competitor): void
    {
        $this->leaderBoard[$competitor->name()] = 'Crashed';
    }

    public function show(): array
    {
        asort($this->leaderBoard, SORT_STRING);
        return $this->leaderBoard;
    }
}