<?php

$input = readline('Write a word: ');
$inputChars = str_split(preg_replace("/[^A-Za-z]/", '', strtolower($input)));

$sequenceOfNums = [];


foreach ($inputChars as $inputChar) {
    switch ($inputChar) {
        case 'a':
        case 'b':
        case 'c':
            $sequenceOfNums[] = 2;
            break;
        case 'd':
        case 'e':
        case 'f':
            $sequenceOfNums[] = 3;
            break;
        case 'g':
        case 'h':
        case 'i':
            $sequenceOfNums[] = 4;
            break;
        case 'j':
        case 'k':
        case 'l':
            $sequenceOfNums[] = 5;
            break;
        case 'm':
        case 'n':
        case 'o':
            $sequenceOfNums[] = 6;
            break;
        case 'p':
        case 'q':
        case 'r':
        case 's':
            $sequenceOfNums[] = 7;
            break;
        case 't':
        case 'u':
        case 'v':
            $sequenceOfNums[] = 8;
            break;
        case 'w':
        case 'x':
        case 'y':
        case 'z':
            $sequenceOfNums[] = 9;
            break;
        default:
            echo 'something went wrong';
    }
}

echo implode(' ', $sequenceOfNums);