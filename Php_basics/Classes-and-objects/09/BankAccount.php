<?php

class BankAccount
{

    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function showUserNameAndBalance(): string
    {
        $s = '';
        if ($this->balance < 0) {
            $s = '-';
        }
        return $this->name . ', ' . $s . '$' . number_format(abs($this->balance), 2);
    }
}