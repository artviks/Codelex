<?php

$word1 = readline('Enter first word: ');
$word2 = readline('Enter second word: ');

$outputLength = 30 - strlen($word1 . $word2);


echo $word1;

for ($i = 0; $i < $outputLength; $i++) {
    echo '.';
}

echo $word2;