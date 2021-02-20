<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

function printArray(array $values): void
{
    foreach ($values as $value) {
        echo $value . ', ';
    }
    echo PHP_EOL;
}

echo "Original numeric array: ";
printArray($numbers);

echo "Sorted numeric array: ";
asort($numbers);
printArray($numbers);

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

echo "Original string array: ";
printArray($words);

echo "Sorted string array: ";
natsort($words);
printArray($words);