<?php

//for ($i = 1; $i < 11; $i++) {
//    echo "$i\r";
//    sleep(1);
//   // echo "\033[1B";
//   // print("\033[2J\033[;H");
//}

require_once 'Car.php';

$car = new Car('car');
$car->setSpeed(1, 10);

echo $car->speed();
