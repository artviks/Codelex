<?php

$desiredSum = (int)readline('Desired sum: ');

if ($desiredSum > 0 && $desiredSum <= 12) {

    do {
        $dice1 = random_int(1, 6);
        $dice2 = random_int(1, 6);
        $sum = $dice1 + $dice2;

        echo "$dice1 and $dice2 = $sum" . PHP_EOL;

    } while ($sum !== $desiredSum);
}