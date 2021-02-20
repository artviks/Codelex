<?php

$integers1 = [];
$integers2 = [];

$length = 10;

for ($i = 0; $i < $length; $i++) {
    $integers1[$i] = random_int(1, 100);
    $integers2[$i] = $integers1[$i];
}

$integers2[$length - 1] = -7;

echo 'Array 1: ';
foreach ($integers1 as $integer) {
    echo $integer . ' ';
}
echo PHP_EOL;

echo 'Array 2: ';
foreach ($integers2 as $integer) {
    echo $integer . ' ';
}