<?php

$int = readline('Integer: ');

if (ctype_digit($int)) {
    echo 'This integer has ' . strlen($int) . ' digits.';
}

if (!ctype_digit($int)) {
    echo 'Did you read what I ask of You!!!';
}