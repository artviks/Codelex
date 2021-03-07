<?php

require_once 'SurveyedCountPerDrink.php';

$surveyed = 12467;
$purchasedEnergyDrinks = 0.14;
$preferCitrusDrinks = 0.64;

$energyDrinkers = new SurveyedCountPerDrink($surveyed, $purchasedEnergyDrinks);
$energyDrinkersCitrus = new SurveyedCountPerDrink($energyDrinkers->getSurveyed(), $preferCitrusDrinks);

echo "Total number of people surveyed " . $surveyed . PHP_EOL
    . "Approximately " . $energyDrinkers->getSurveyed() . " bought at least one energy drink" . PHP_EOL
    . $energyDrinkersCitrus->getSurveyed() . " of those prefer citrus flavored energy drinks.";
