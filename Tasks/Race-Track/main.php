<?php

//for ($i = 1; $i < 11; $i++) {
//    echo "$i\r";
//    sleep(1);
//   // echo "\033[1B";
//   // print("\033[2J\033[;H");
//}

require_once 'MovingObjects/Car.php';
require_once 'MovingObjects/Bike.php';
require_once 'MovingObjects/MovingObjectCollection.php';
require_once 'RaceTrack.php';
require_once 'Race.php';


$competitors = new MovingObjectCollection();
$competitors->addMany([
    new Car('A', 1, 3),
    new Car('B', 0, 4),
    new Bike('C', 2, 3)
]);

$track = new RaceTrack(10, '-');
$race = new Race($track, $competitors);


for ($i = 0; $i < 5; $i++) {
    $race->startRacing();
    foreach ($track->show() as $row) {
        echo implode(' ', $row) . PHP_EOL;
    }
    sleep(1);
  //  echo "\033[3A";

}
 var_dump($race->getLeaderBoard());