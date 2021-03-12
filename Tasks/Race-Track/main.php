<?php

//for ($i = 1; $i < 11; $i++) {
//    echo "$i\r";
//    sleep(1);
//   // echo "\033[1B";
//   // print("\033[2J\033[;H");
//}


require_once 'MovingObjects/MovingObjectCollection.php';
require_once 'Competitors/CompetitorCollection.php';
require_once 'RaceTrack.php';
require_once 'Race.php';


$competitors = new CompetitorCollection();
$competitors->addMany([
    new FastCompetitor('Hamilton', new Car('Mercedes', 1, 4)),
    new SlowCompetitor('Block', new Car('Ford', 1, 4)),
    new FastCompetitor('Rossi', new Bike('Ducati', 2, 3))
]);

$track = new RaceTrack(20, '-');
$race = new Race($track, $competitors);

do {
    $race->startRacing();
    foreach ($track->show() as $row) {
        echo implode(' ', $row) . PHP_EOL;
    }
    sleep(1);

    if (!$race->isOver()) {
        echo "\033[3A";
    }


} while (!$race->isOver());