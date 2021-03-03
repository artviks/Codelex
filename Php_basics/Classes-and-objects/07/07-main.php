<?php

require_once 'Dog.php';
require_once 'DogTest.php';

$dogTest = new DogTest();
$dogTest->setDogs([
    new Dog('Max', 'male'),
    new Dog('Rocky', 'male'),
    new Dog('Sparky', 'male'),
    new Dog('Buster', 'male'),
    new Dog('Sam', 'male'),
    new Dog('Lady', 'female'),
    new Dog('Molly', 'female'),
    new Dog('Coco', 'female')
]);

$dogTest->setDogsParents('Max', 'Rocky', 'Lady');
$dogTest->setDogsParents('Coco', 'Buster', 'Molly');
$dogTest->setDogsParents('Rocky', 'Sam', 'Molly');
$dogTest->setDogsParents('Buster', 'Sparky', 'Lady');

echo $dogTest->getDog('Coco')->fatherName() . PHP_EOL
    . $dogTest->getDog('Sparky')->fatherName() . PHP_EOL;

echo $dogTest->getDog('Coco')->hasSameMotherAs($dogTest->getDog('Rocky'));