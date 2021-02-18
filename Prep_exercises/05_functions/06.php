<?php

$items = [1, 2, 3, 1.5, 'a'];

function double(int $num): int
{
    return $num * 2;
}

for ($i = 0; $i < count($items); $i++) {
    echo is_int($items[$i]) ? double($items[$i]) : $items[$i];
    echo PHP_EOL;
}