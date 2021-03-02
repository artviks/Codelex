<?php

class DogTest
{
    private array $dogs = [];

    public function getDog(string $dogsName): Dog
    {
        return $this->dogs[$this->findDog($dogsName)];
    }

    public function setDog(Dog $dog): void
    {
        $this->dogs[] = $dog;
    }

    public function setDogs(array $dogs): void
    {
        foreach ($dogs as $dog) {
            $this->setDog($dog);
        }
    }

    public function setDogsParents(string $dogsName, string $fathersName, string $mothersName): void
    {
        $dog = $this->dogs[$this->findDog($dogsName)];
        $father = $this->dogs[$this->findDog($fathersName)];
        $mother = $this->dogs[$this->findDog($mothersName)];
        $dog->setFather($father);
        $dog->setMother($mother);
    }

    private function findDog(string $dogsName): int
    {
        foreach ($this->dogs as $index => $dog) {
            if ($dog->getName() === $dogsName) {
                return $index;
            }
        }
        throw new InvalidArgumentException('This dog does not exist!');
    }
}