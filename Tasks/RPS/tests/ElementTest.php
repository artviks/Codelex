<?php

namespace Tests;

use App\elements\Paper;
use App\elements\Rock;
use App\elements\Scissors;
use PHPUnit\Framework\TestCase;

class ElementTest extends TestCase
{
    public function testGetNameRock(): void
    {
        $element = new Rock();
        self::assertEquals('Rock', $element->name());
    }

    public function testGetNamePaper(): void
    {
        $element = new Paper();
        self::assertEquals('Paper', $element->name());
    }

    public function testGetNameScissors(): void
    {
        $element = new Scissors();
        self::assertEquals('Scissors', $element->name());
    }

    public function testWinRock(): void
    {
        $element = new Rock();
        self::assertEquals(Scissors::class, $element->wins());
    }

    public function testWinPaper(): void
    {
        $element = new Paper();
        self::assertEquals(Rock::class, $element->wins());
    }

    public function testWinScissors(): void
    {
        $element = new Scissors();
        self::assertEquals(Paper::class, $element->wins());
    }
}