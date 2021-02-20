<?php

$randomNum = random_int(1, 100);

echo 'I`m thinking of a number between 1-100.  Try to guess it.' . PHP_EOL;

$inputNum = readline('> ');

if ($inputNum === $randomNum) {
    echo "You guessed it!  What are the odds?!?";
}

if ($inputNum < $randomNum) {
    echo "Sorry, you are too low.  I was thinking of $randomNum.";
}

if ($inputNum > $randomNum) {
    echo "Sorry, you are too high.  I was thinking of $randomNum.";
}