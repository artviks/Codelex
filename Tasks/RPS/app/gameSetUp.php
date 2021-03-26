<?php

use App\{Game, ElementCollection};
use App\elements\{Rock, Paper, Scissors};

$elements = new ElementCollection;
$elements->addMany([
    new Rock(),
    new Paper(),
    new Scissors()
]);

return $elements;