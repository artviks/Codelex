<?php

class Person
{
    public string $name;
    public string $surname;
    public int $age;
    public string $birthday;

    public function __construct(string $name, string $surname, int $age, string $birthday) {

        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->birthday = $birthday;
    }
}

$persons = [
    new Person('John', 'Doe', 50, '01.01.1971'),
    new Person('Jane', 'Doe', 40, '01.02.1981')
];

foreach ($persons as $person) {
    foreach ($person as $key => $value) {
        echo $key . ' = ' . $value . PHP_EOL;
    }
    echo PHP_EOL;
}
