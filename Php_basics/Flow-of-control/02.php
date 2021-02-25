<?php

$num = readline('Enter the number: ');

if (!is_numeric($num)) {
    exit('This is NOT a number');
}

if ((int)$num === 0) {
    echo 'This number is nether.';
} else {
    echo $num > 0 ? 'This number is positive' : 'This number is negative';
}