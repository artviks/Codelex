<?php

class SurveyedCountPerDrink
{
    private int $surveyed;

    public function __construct(int $base, float $percentile)
    {
        $this->surveyed = $base * $percentile;
    }

    public function getSurveyed(): int
    {
        return round($this->surveyed);
    }
}