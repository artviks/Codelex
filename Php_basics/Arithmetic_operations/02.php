<?php

function checkOddEven(int $num): string
{
    return $num % 2 === 0 ? 'Even Number' : 'Odd Number';
}

echo checkOddEven(readline('Give me some number: '));
exit(PHP_EOL . 'bye!');