<?php

$items = [
    'Tanks' => 10000.00,
    'Niere' => 100.00,
    'Auto' => 1000.00,
    'Kruze' => 1.0,
    'Maize' => 0.50
];

foreach ($items as $key => $value) {
    echo "$key = $value" . PHP_EOL;
}

$item = readline('Choose an item (name): ');
$amount = readline('Choose amount: ');
$price = 0;

foreach ($items as $key => $value) {
    if ($item === $key) {
        $price = $amount * $value;
    }
}

echo "You bought $item, amount: $amount, total price: $price";
