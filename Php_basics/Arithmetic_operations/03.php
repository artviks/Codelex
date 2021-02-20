<?php

$lowerBound = 1;
$upperBound = 100;
$average = ($lowerBound + $upperBound) / 2;

function sumAllInRageOf(int $num1, int $num2): int
{
    $sum = 0;
    for ($i = $num1; $i <= $num2; $i++) {
        $sum += $i;
    }
    return $sum;
}

echo "The sum of $lowerBound to $upperBound is " . sumAllInRageOf($lowerBound, $upperBound) . PHP_EOL
    . 'The average is ' . $average;
