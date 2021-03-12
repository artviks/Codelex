<?php

class Race
{
    private RaceTrack $track;
    private CompetitorCollection $competitors;

    public function __construct(RaceTrack $track, CompetitorCollection $competitors)
    {
        $this->track = $track;
        $this->competitors = $competitors;
        $this->track->buildTrack($this->competitors->size());
        $this->getReady();
    }

    public function startRacing(): void
    {
        foreach ($this->competitors as $i => $competitor)
        {
            $this->move($competitor, $i);
        }
    }

    private function move(Competitor $competitor, int $row): void
    {
        $symbol = $this->symbol($competitor);
        $speed = $competitor->vehicle()->speed();
        $index = $this->find($competitor, $row) + $speed;


        if ($speed > 0 && $this->track->length() > $index)
        {
            $this->track->setCells($row, $index, $symbol);
            $this->track->setCells($row, $this->find($competitor, $row), $this->track->pavement());
        }

        if ($this->track->length() <= $index && $competitor->isMoving())
        {
            $this->track->setCells($row, $this->find($competitor, $row), $this->track->pavement());
            $this->track->setCells($row, $this->track->length() - 1, $symbol);
            $competitor->stop();
        }
    }

    public function isOver(): bool
    {
        $stopped = [];
        foreach ($this->competitors as $i => $competitor) {
            if (!$competitor->isMoving()) {
                $stopped[$i] = $competitor;
            }
        }
        return count($stopped) === $this->competitors->size();
    }

    private function getReady(): void
    {
        foreach ($this->competitors as $i => $competitor)
        {
            $this->track->setCells($i, 0, $this->symbol($competitor));
            $competitor->drive();
        }
    }

    private function find(Competitor $competitor, int $row): int
    {
        return array_search($this->symbol($competitor), $this->track->show()[$row], true);
    }

    private function symbol(Competitor $competitor): string
    {
        return $competitor->name()[0];
    }


}