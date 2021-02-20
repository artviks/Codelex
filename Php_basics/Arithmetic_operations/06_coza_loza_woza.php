<?php

$num1 = 1;
$num2 = 110;
$numInOneLine = 11;
$lines = ceil(($num2 - $num1 + 1) / $numInOneLine);
$acc = 0;

for ($i = $num1; $i <= $lines; $i++) {
    for ($j = $num1; $j <= $numInOneLine; $j++) {
        if (($acc + $j) % 3 === 0 || ($acc + $j) % 5 === 0 || ($acc + $j) % 7 === 0) {
            echo ($acc + $j) % 3 === 0 ? 'Coza' : '';
            echo ($acc + $j) % 5 === 0 ? 'Loza' : '';
            echo ($acc + $j) % 7 === 0 ? 'Woza' : '';
        } else {
            echo($acc + $j);
        }
        echo ' ';
    }
    $acc += $numInOneLine;
    echo PHP_EOL;
}
