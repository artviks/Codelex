<?php

require_once 'MovingObjects/MovingObjectCollection.php';
require_once 'Competitors/CompetitorCollection.php';
require_once 'RaceTrack.php';
require_once 'LeaderBoard.php';
require_once 'Race.php';

$competitors = new CompetitorCollection();
$competitors->addMany([
    new FastCompetitor('Hamilton', new Car('Mercedes', 1, 4, 2)),
    new SlowCompetitor('Block', new Car('Ford', 1, 4, 5)),
    new FastCompetitor('Rossi', new Bike('Ducati', 2, 3, 10))
]);

$track = new RaceTrack(20, '-');
$leaderBoard = new LeaderBoard();
$race = new Race($track, $competitors, $leaderBoard);



$interval = 1;
$time = 0;
do {
    $time += $interval;

    $race->startRacing($time);

    foreach ($track->show() as $row) {
        echo implode(' ', $row) . PHP_EOL;
    }
    sleep($interval);

    if (!$race->isOver()) {
        echo "\033[3A";
    }


} while (!$race->isOver());

foreach ($leaderBoard->show() as $competitor => $time) {
    echo "$competitor -> $time" . PHP_EOL;
}