<?php

$num = 2;

if ($num > 0 && $num % 2 === 0 && is_integer($num)) {
    echo 'it is an even positive integer';
} else {
    echo 'Ops!';
}

echo PHP_EOL;