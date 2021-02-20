<?php

$weight = readline('Your weight in kg: ');
$height = readline('Your height in cm: ');

function bmi(float $weight, float $height): string
{
    $bmi = ($weight * 2.205 * 703) / (($height / 2.54) ** 2);
    if ($bmi > 25) {
        return 'You are overweight!';
    }
    if ($bmi < 18.5) {
        return 'You are underweight!';
    }
    return 'You have an optimal weight!';
}

echo bmi($weight, $height);