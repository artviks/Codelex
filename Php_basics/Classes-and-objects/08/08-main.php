<?php

require_once 'SavingsAccount.php';
require_once '08-functions.php';

$account = new SavingsAccount(readline('How much money is in the account?: '));
$account->setAnnualInterest(readline('Enter the annual interest rate: '));


$months = readline('How long has the account been opened? ');
$i = 1;

while ($months > 0) {

    $account->deposit(readline('Enter amount deposited for month ' . $i . ': '));
    $account->withdrawal(readline('Enter amount withdrawn for ' . $i . ': '));
    $account->addMonthlyInterest();

    $i++;
    $months--;
}


echo 'Total deposited: ' . format($account->getTotalDeposit()) . PHP_EOL
    . 'Total withdrawal: ' . format($account->getTotalWithdrawal()) . PHP_EOL
    . 'Interest earned: ' . format($account->getInterestEarned()) . PHP_EOL
    . 'Ending balance: ' . format($account->getBalance());