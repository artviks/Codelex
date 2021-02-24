<?php

$base = readline("Input number: ");
$exponent = readline('To the power: ');

$result = 1;

if ($exponent >= 0) {
    for ($i = 0; $i < $exponent; $i++) {
        $result *= $base;
    }
} else {
    for ($i = $exponent; $i < 0; $i++) {
        $result /= $base;
    }
}

echo 'Result: ' . $result;