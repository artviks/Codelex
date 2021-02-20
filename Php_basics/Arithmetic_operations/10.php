<?php

class Geometry
{
    public float $num1;
    public float $num2;

    public function testPositive(float $num1, float $num2 = null): void {
        if ($num1 < 0 || $num2 < 0) {
            throw new Error('Only positive values!');
        }
    }

    public function circleArea(): string
    {
        $this->setNum1(readline('Radius: '));
        $this->testPositive($this->num1);
        return 'Area: ' . M_PI * $this->num1 ** 2;
    }

    public function rectangleArea(): string
    {
        $this->setNum1(readline('Length: '));
        $this->setNum2(readline('Width: '));
        $this->testPositive($this->num1, $this->num2);
        return 'Area: ' . $this->num1 * $this->num2;
    }

    public function triangleArea(): string
    {
        $this->setNum1(readline('Length: '));
        $this->setNum2(readline('Width: '));
        $this->testPositive($this->num1, $this->num2);
        return 'Area: ' . $this->num1 * $this->num2 * 0.5;
    }

    public function setNum1(string $num1): void
    {
        $this->num1 = (float)$num1;
    }

    public function setNum2(string $num2): void
    {
        $this->num2 = (float)$num2;
    }

}

echo "Geometry Calculator:" . PHP_EOL
    . "1. Calculate the Area of a Circle" . PHP_EOL
    . "2. Calculate the Area of a Rectangle" . PHP_EOL
    . "3. Calculate the Area of a Triangle" . PHP_EOL
    . "4. Quit" . PHP_EOL;

function calculateGeometry(string $selection): string
{
    $geometry = new Geometry();
    if ($selection === '1') {
        return $geometry->circleArea();
    }

    if ($selection === '2') {
        return $geometry->rectangleArea();
    }

    if ($selection === '3') {
        return $geometry->triangleArea();
    }

    if ($selection === '4') {
        exit('Bye!');
    }
    throw new Error('Select only integers 1, 2, 3, 4.');
}

$selection = readline('Enter your choice (1-4) : ');

try {
    echo calculateGeometry($selection);
} catch (Error $e) {
    echo 'Error: ' . $e->getMessage();
}