<?php

function format(float $num): string
{
    return '$' . number_format($num, 2);
}