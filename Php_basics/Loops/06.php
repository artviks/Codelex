<?php


$rows = 7;

for ($i = 0; $i < $rows; $i++) {
    $lineLeft = str_repeat('////', $rows - 1 - $i);
    $lineRight = str_repeat('\\\\\\\\', $rows - 1 - $i);
    $star = str_repeat('****', $i);
    echo $lineLeft . $star . $star . $lineRight . PHP_EOL;
}