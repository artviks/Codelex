<?php

class Student
{
    private string $name;
    private int $age;
    private string $grade = '';

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setGrade(string $grade): void
    {
        $this->grade = $grade;
    }
}


class School
{
    private array $students;
    private array $ageGrade = [
        7 => 1,
        8 => 2,
        9 => 3,
        10 => 4,
        11 => 5,
        12 => 6
    ];
    private array $grades = [
        1 => [],
        2 => [],
        3 => [],
        4 => [],
        5 => [],
        6 => [],
    ];

    public function __construct(array $students)
    {
        $this->students = $students;
        $this->setGrades($students);

    }

    private function setGrades(array $students): void
    {
        foreach ($this->ageGrade as $age => $grade) {
            foreach ($students as $student) {
                if ($student->getAge() === $age) {
                    $student->setGrade($grade);
                    $this->grades[$grade][] = $student;
                }
            }
        }
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public function getGrades(): array
    {
        return $this->grades;
    }
}

$students = [
    new Student('John', 9),
    new Student('Jane', 9),
    new Student('Bob', 8)
];

$school = new School($students);

foreach ($school->getGrades() as $grade => $students) {
    echo $grade . '. grade:' . PHP_EOL;
    foreach ($students as $num => $student) {
        echo "\t" . ($num + 1) . '. ' . $student->getName() . PHP_EOL;
    }
}
