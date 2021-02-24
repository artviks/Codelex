<?php

echo "Welcome to Piglet!" . PHP_EOL;

$points = 0;

do {
    $youRolled = random_int(1, 6);
    echo "You rolled a $youRolled!" . PHP_EOL;

    if ($youRolled === 1) {
        exit("You got 0 points.");
    }

    $points += $youRolled;
    $continue = readline('Roll again? [y/n] ');

} while ($continue === 'y');

echo "You got $points points.";