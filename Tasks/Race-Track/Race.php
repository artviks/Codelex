<?php

class Race
{
    private RaceTrack $track;
    private MovingObjectCollection $participants;

    public function __construct(RaceTrack $track, MovingObjectCollection $participants)
    {
        $this->track = $track;
        $this->participants = $participants;
        $this->track->buildTrack($this->participants->size());
    }

    public function track(): RaceTrack
    {
        return $this->track;
    }




}