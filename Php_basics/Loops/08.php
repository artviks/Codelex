<?php

$min = (int)readline('Min? ');
$max = (int)readline('Max? ');
$numbers = [];

for ($i = $min; $i <= $max; $i++) {
    $numbers[] = $i;
}

for ($i = $min; $i <= $max; $i++) {
    echo implode('', $numbers) . PHP_EOL;
    $numbers[] = array_shift($numbers);
}