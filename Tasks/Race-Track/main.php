<?php

//for ($i = 1; $i < 11; $i++) {
//    echo "$i\r";
//    sleep(1);
//   // echo "\033[1B";
//   // print("\033[2J\033[;H");
//}

require_once 'MovingObjects/Car.php';
require_once 'MovingObjects/MovingObjectCollection.php';
require_once 'RaceTrack.php';
require_once 'Race.php';


$participants = new MovingObjectCollection();
$participants->addMany([
    new Car('A', 1, 2),
    new Car('B', 1, 3)
]);

$race = new Race(new RaceTrack(30, '*'), $participants);

foreach ($race->track()->show() as $row) {
    echo implode(' ', $row) . PHP_EOL;
}