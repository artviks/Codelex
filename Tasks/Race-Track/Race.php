<?php

class Race
{
    private RaceTrack $track;
    private MovingObjectCollection $competitors;
    private array $leaderBoard = [];

    public function __construct(RaceTrack $track, MovingObjectCollection $competitors)
    {
        $this->track = $track;
        $this->competitors = $competitors;
        $this->track->buildTrack($this->competitors->size());
        $this->getReady();
    }

    public function startRacing(): void
    {
        $time = 0;
        foreach ($this->competitors as $i => $competitor)
        {
            $this->move($competitor, $i);
        }
    }

    private function move(MovingObject $competitor, int $row): void
    {
        $speed = $competitor->speed();
        $index = $this->find($competitor, $row) + $speed;


        if ($speed > 0 && $this->track->length() > $index)
        {
            $this->track->setCells($row, $index, $competitor->name());
            $this->track->setCells($row, $this->find($competitor, $row), $this->track->pavement());
        }

        if ($this->track->length() <= $index && $competitor->isMoving())
        {
            $this->track->setCells($row, $this->find($competitor, $row), $this->track->pavement());
            $this->track->setCells($row, $this->track->length() - 1, $competitor->name());
            $this->leaderBoard[] = $competitor;
            $competitor->stop();
        }
    }

    public function getLeaderBoard(): array
    {
        return $this->leaderBoard;
    }

    private function getReady(): void
    {
        foreach ($this->competitors as $i => $competitor)
        {
            $this->track->setCells($i, 0, $competitor->name());
            $competitor->drive();
        }
    }

    private function find(MovingObject $competitor, int $row): int
    {
        return array_search($competitor->name(), $this->track->show()[$row], true);
    }


}