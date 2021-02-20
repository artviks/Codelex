<?php

class Employee
{
    private float $basePay;
    private int $hoursWorked;

    public function __construct(float $basePay, int $hoursWorked)
    {
        $this->basePay = $basePay;
        $this->hoursWorked = $hoursWorked;
    }

    public function totalPay(): float
    {
        if ($this->basePay < 8.00) {
            throw new Error('Base pay too low. Must be at least $8.00');
        }
        if ($this->hoursWorked > 60) {
            throw new Error('Too many hours worked. Must be below 60 hours');
        }

        return $this->basePay * $this->hoursWorked;
    }
}

$employees = [
    new Employee(7.50, 35),
    new Employee(8.20, 47),
    new Employee(10.00, 73)
];

function totalPayAll(array $employees): array
{
    $totalPayAll = [];
    foreach ($employees as $employee) {
        try {
            $employee->totalPay();
            $totalPayAll[] = $employee->totalPay();
        } catch (Error $e) {
            $totalPayAll[] = 'Error: ' . $e->getMessage();
        }
    }
    return $totalPayAll;
}

foreach (totalPayAll($employees) as $item) {
    echo $item . PHP_EOL;
}