<?php

$maxValue = readline('Max value? ');
$columns = 20;
$rows = ceil($maxValue / $columns);
$acc = 0;

for ($i = 0; $i < $rows; $i++) {
    for ($j = 1; $j <= $columns; $j++) {
        $num = $j + $acc;
        if ($num > $maxValue) {
            exit();
        }
        if (($num) % 3 === 0 || ($num) % 5 === 0) {
            echo ($num) % 3 === 0 ? 'Fizz' : '';
            echo ($num) % 5 === 0 ? 'Buzz' : '';
        } else {
            echo($num);
        }
        echo ' ';
    }
    $acc += $columns;
    echo PHP_EOL;
}