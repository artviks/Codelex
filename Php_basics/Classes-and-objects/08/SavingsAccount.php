<?php

class SavingsAccount
{
    private float $balance;
    private float $annualInterest = 0;
    private float $totalWithdrawal = 0;
    private float $totalDeposit = 0;
    private float $interestEarned = 0;

    public function __construct(float $startingBalance)
    {
        $this->balance = $startingBalance;
    }

    public function withdrawal(float $amount): void
    {
        $this->balance -= $amount;
        $this->totalWithdrawal += $amount;

    }

    public function deposit(float $amount): void
    {
        $this->balance += $amount;
        $this->totalDeposit += $amount;
    }

    public function addMonthlyInterest(): void
    {
        $this->interestEarned += $this->balance * $this->annualInterest / 100 / 12;
        $this->balance *= (1 + $this->annualInterest / 100 / 12);
    }

    public function setAnnualInterest(float $annualInterest): void
    {
        $this->annualInterest = $annualInterest;
    }

    public function getTotalDeposit(): float
    {
        return $this->totalDeposit;
    }

    public function getTotalWithdrawal(): float
    {
        return $this->totalWithdrawal;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getInterestEarned(): float
    {
        return $this->interestEarned;
    }
}
