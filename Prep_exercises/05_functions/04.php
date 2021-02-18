<?php

class Person
{
    public string $name;
    public string $surname;
    public string $age;

    public function __construct(string $name, string $surname, int $age)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }

    public function isOfAge(): string
    {
        return $this->age < 18 ? "$this->name is younger than 18" : "$this->name is older than 18";
    }
}

$persons = [
    new Person ('John', 'Doe', 20),
    new Person ('Jane', 'Doe', 17)
];

foreach ($persons as $person) {
    echo $person->isOfAge() . PHP_EOL;
}