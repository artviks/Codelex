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

    public function getGrade(): string
    {
        return $this->grade;
    }
}


class School
{
    private string $name;
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

    public function getName(): string
    {
        return $this->name;
    }

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addStudent(Student $student): void
    {
        $this->students[] = $student;
    }

    public function addManyStudents(array $students): void
    {
        foreach ($students as $student) {
            $this->addStudent($student);
        }
    }

    public function setGradesForStudents(): void
    {
        foreach ($this->ageGrade as $age => $grade) {
            foreach ($this->students as $student) {
                if ($student->getAge() === $age) {
                    $student->setGrade($grade);
                }
            }
        }
    }

    public function putStudentsInGrades(): void
    {
        foreach ($this->ageGrade as $age => $grade) {
            foreach ($this->students as $student) {
                if ($student->getAge() === $age) {
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

$school = new School('ABC');
$school->addManyStudents($students);
$school->setGradesForStudents();
$school->putStudentsInGrades();


echo PHP_EOL . $school->getName() . PHP_EOL;
foreach ($school->getGrades() as $grade => $students) {
    echo $grade . '. grade:' . PHP_EOL;
    foreach ($students as $num => $student) {
        echo "\t" . ($num + 1) . '. ' . $student->getName() . PHP_EOL;
    }
}
