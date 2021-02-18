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
}

$persons = [
    new Person ('John', 'Doe', 20),
    new Person ('Jane', 'Doe', 17)
];

function isOfAge(object $person): string
{
    return $person->age < 18 ? ' is younger than 18' : ' is older than 18';
}

foreach ($persons as $person) {
    echo $person->name . isOfAge($person) . PHP_EOL;
}
