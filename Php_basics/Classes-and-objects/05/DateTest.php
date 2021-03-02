<?php

require_once 'Date.php';
require_once 'functions.php';

$date = new Date(2,3,2021);
echo displayDate($date) . PHP_EOL;

$date->setDay(20);
echo displayDate($date);