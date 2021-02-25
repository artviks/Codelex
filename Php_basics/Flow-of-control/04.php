<?php

$dayNum = readline('Number of the day: ');

if ($dayNum >= 0 && $dayNum < 7 && ctype_digit($dayNum)) {
    switch ($dayNum) {
        case 0:
            echo 'Sunday';
            break;
        case 1:
            echo 'Monday';
            break;
        case 2:
            echo 'Tuesday';
            break;
        case 3:
            echo 'Wednesday';
            break;
        case 4:
            echo 'Thursday';
            break;
        case 5:
            echo 'Friday';
            break;
        case 6:
            echo 'Saturday';
            break;
    }
} else {
    echo 'Not a valid day';
}