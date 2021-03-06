<?php


// All input money is in cents
require_once 'Account.php';
require_once 'functions.php';

$matt = new Account('Matt`s account', 100000);
$my = new Account('My account', 0);

transfer($matt, $my, 10000);

echo showAccounts([$matt, $my]);

$a = new Account('A', 10000);
$b = new Account('B', 0);
$c = new Account('C', 0);

transfer($a, $b, 5000);
transfer($b, $c, 2500);

echo showAccounts([$a, $b, $c]);

