<?php

class Dog
{
    private string $name;
    private string $sex;

    private Dog $father;
    private Dog $mother;

    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function fatherName(): string
    {
        return isset($this->father) ? $this->father->getName() : 'Unknown';
    }

    public function hasSameMotherAs(Dog $otherDog): string
    {
        return $this->mother->getName() === $otherDog->getMother()->getName() ? 'true' : 'false';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function getFather(): Dog
    {
        return $this->father;
    }

    public function getMother(): Dog
    {
        return $this->mother;
    }

    public function setFather(Dog $father): void
    {
        $this->father = $father;
    }

    public function setMother(Dog $mother): void
    {
        $this->mother = $mother;
    }

}