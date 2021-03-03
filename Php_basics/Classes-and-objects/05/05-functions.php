<?php

function displayDate(Date $date): string
{
    return $date->getDay() . '/' . $date->getMonth() . '/' . $date->getYear();
}