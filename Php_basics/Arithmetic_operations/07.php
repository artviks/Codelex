<?php

$time = 10; // s
$gravity = -9.81; // for Earth -9.81 m/s^2

function freeFallDistance (float $time, float $gravity): float {
    return ($gravity * ($time ** 2)) / 2;
}

echo freeFallDistance($time, $gravity) . 'm';