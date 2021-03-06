<?php

class Account
{
    // All money is in cents.
    private string $name;
    private int $balance;

    public function __construct(string $name, int $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function withdrawal(int $money): void
    {
        $this->balance -= $money;
    }

    public function deposit(int $money): void
    {
        $this->balance += $money;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }
}