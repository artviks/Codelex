<?php

class Race
{
    private RaceTrack $track;
    private CompetitorCollection $competitors;
    private LeaderBoard $board;

    public function __construct(RaceTrack $track, CompetitorCollection $competitors, LeaderBoard $board)
    {
        $this->track = $track;
        $this->competitors = $competitors;
        $this->board = $board;
        $this->track->addLanes($this->competitors->size());
        $this->getReady();
    }

    public function startRacing(int $time): void
    {
        foreach ($this->competitors as $row => $competitor)
        {
            $this->move($competitor, $row, $time);
        }
    }

    private function move(Competitor $competitor, int $row, int $time): void
    {
        $symbol = $this->symbol($competitor);
        $speed = $competitor->vehicle()->speed();
        $index = $this->find($competitor, $row) + $speed;

        if ($competitor->vehicle()->crashed()) {
            $competitor->stop();
            $this->board->addCrashed($competitor);
        }


        if ($speed > 0 && $this->track->length() > $index && $competitor->isMoving())
        {
            $this->track->setCells($row, $index, $symbol);
            $this->cleanPreviousPosition($competitor, $row);
        }

        if ($this->track->length() <= $index && $competitor->isMoving())
        {
            $this->cleanPreviousPosition($competitor, $row);
            $this->track->setCells($row, $this->track->length() - 1, $symbol);
            $competitor->stop();
            $this->board->addFinished($competitor, $time);
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

    private function cleanPreviousPosition(Competitor $competitor, int $row): void
    {
        $this->track->setCells($row, $this->find($competitor, $row), $this->track->pavement());
    }


}