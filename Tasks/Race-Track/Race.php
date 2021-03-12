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
            $this->checkCrash($competitor);
            $this->move($competitor, $row, $time);
        }
    }

    public function isOver(): bool
    {
        return count(array_filter($this->competitors->getIterator()->getArrayCopy(),
                fn (Competitor $competitor) => !$competitor->isMoving()))
            === $this->competitors->size();
    }

    private function move(Competitor $competitor, int $row, int $time): void
    {
        $speed = $competitor->vehicle()->speed();
        $index = $this->find($competitor, $row) + $speed;

        if (!$this->finished($index) && $competitor->isMoving())
        {
            $this->track->setCells($row, $index, $this->symbol($competitor));
            $this->cleanPreviousPosition($competitor, $row);
        }

        if ($this->finished($index) && $competitor->isMoving())
        {
            $this->cleanPreviousPosition($competitor, $row);
            $this->track->setCells($row, $this->track->length() - 1, $this->symbol($competitor));
            $competitor->stop();
            $this->board->addFinished($competitor, $time);
        }
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

    private function checkCrash(Competitor $competitor): void
    {
        if ($competitor->vehicle()->crashed())
        {
            $competitor->stop();
            $this->board->addCrashed($competitor);
        }
    }

    private function finished(int $index): bool
    {
        return $this->track->length() <= $index;
    }

}