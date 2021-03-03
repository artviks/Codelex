<?php

require_once 'BankAccount.php';

$ben1 = new BankAccount('Benson', 17.25);
echo $ben1->showUserNameAndBalance(). PHP_EOL;

$ben2 = new BankAccount('Benson', -17.25);
echo $ben2->showUserNameAndBalance(). PHP_EOL;