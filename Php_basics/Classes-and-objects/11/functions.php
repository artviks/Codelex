<?php


function transfer(Account $from, Account $to, int $howMuch): void
{
    $from->withdrawal($howMuch);
    $to->deposit($howMuch);
}

function showAccount(Account $account): string
{
    $fmt = new NumberFormatter('de_DE', NumberFormatter::CURRENCY);
    $money = $fmt->formatCurrency($account->getBalance() / 100, "EUR");

    return $account->getName() . PHP_EOL
        . 'Final balance: ' . $money . PHP_EOL;
}

function showAccounts(array $accounts): string
{
    $show = [];
    foreach ($accounts as $account) {
        $show[] = showAccount($account);
    }
    return PHP_EOL . implode(PHP_EOL, $show);
}