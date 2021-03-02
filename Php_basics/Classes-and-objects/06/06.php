<?php

$surveyed = 12467;
$purchasedEnergyDrinks = 0.14;
$preferCitrusDrinks = 0.64;

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

$energyDrinkers = new SurveyedCountPerDrink($surveyed, $purchasedEnergyDrinks);
$energyDrinkersCitrus = new SurveyedCountPerDrink($energyDrinkers->getSurveyed(), $preferCitrusDrinks);

echo "Total number of people surveyed " . $surveyed . PHP_EOL
    . "Approximately " . $energyDrinkers->getSurveyed() . " bought at least one energy drink" . PHP_EOL
    . $energyDrinkersCitrus->getSurveyed() . " of those prefer citrus flavored energy drinks.";
