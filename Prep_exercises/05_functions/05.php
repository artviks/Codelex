<?php

$fruits = [
    [
        'name' => 'Apple',
        'weight' => 1
    ],
    [
        'name' => 'Banana',
        'weight' => 11
    ],
    [
        'name' => 'Orange',
        'weight' => 40
    ],
];

$costs = [
    10 => 1,
    20 => 2,
    30 => 3
];

function shippingCost(array $fruit, array $costs): int
{
    foreach ($costs as $weight => $price) {
        if ($fruit['weight'] <= $weight) {
            return $price;
        }
    }
    return 10;
}

foreach ($fruits as $fruit) {
    echo $fruit['name'] .', '. $fruit['weight'] . ' kg, shipping price = ' . shippingCost($fruit, $costs) . PHP_EOL;
}
