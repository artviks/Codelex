<?php

class Point {
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setX(int $x): void
    {
        $this->x = $x;
    }

    public function setY(int $y): void
    {
        $this->y = $y;
    }
}

function swapPoints(Point $point1, Point $point2): void
{
    $x1 = $point1->getX();
    $y1 = $point1->getY();
    $x2 = $point2->getX();
    $y2 = $point2->getY();

    $point1->setX($x2);
    $point1->setY($y2);
    $point2->setX($x1);
    $point2->setY($y1);
}

$point1 = new Point(5,2);
$point2 = new Point(-3, 6);

echo "Before:" . PHP_EOL
    . "({$point1->getX()}, {$point1->getY()})" . PHP_EOL
    . "({$point2->getX()}, {$point2->getY()})" . PHP_EOL;

swapPoints($point1, $point2);

echo "After:" . PHP_EOL
    . "({$point1->getX()}, {$point1->getY()})" . PHP_EOL
    . "({$point2->getX()}, {$point2->getY()})" . PHP_EOL;
