<?php

$options = ['R' => , 'P', 'S']
$validInput = ['R', 'P', 'S'];

$userChose = strtoupper(readline('Enter: '));

foreach ($validInput as $input) {
    if ($input === $userChose) {
        echo $userChose;
    }
}


