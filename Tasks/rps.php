<?php

// R(1), P(2), S(3)
// S(3) win P(2)
// P(2) win R(1)
// R(1) win S(3)

$providedOptions = [
    'Rock' => 1,
    'Paper' => 2,
    'Scissors' => 3
];

foreach ($providedOptions as $providedOption => $num) {
    echo "For $providedOption press $num" . PHP_EOL;
}

$userInput = readline('Pass you choice here => ');
$computerInput = random_int(1, 3);
$both = [$userInput, $computerInput];

echo "Computer`s choice=> $computerInput" . PHP_EOL;

switch (abs($userInput - $computerInput)) {
    case 0:
        echo 'It is a tie';
        break;
    case 1:
        echo max($both) === $userInput ? 'You win' : 'You loose';
        break;
    case 2:
        echo min($both) === $userInput ? 'You win' : 'You loose';
        break;
}
