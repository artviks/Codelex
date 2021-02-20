<?php

$givenInt = 10;

function calculateFact(int $num): int
{
    $factorial = 1;
    for ($i = 1; $i <= $num; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}

echo calculateFact($givenInt) . PHP_EOL;