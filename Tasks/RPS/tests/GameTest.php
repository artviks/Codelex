<?php

namespace Tests;

use App\elements\Rock;
use App\Game;
use PHPUnit\Framework\TestCase;


class GameTest extends TestCase
{
    public function testIsUserRock(): void
    {
        $game = new Game(require "./../app/gameSetUp.php");
        $game->setUser(0);

        self::assertEquals('Rock', $game->getUser()->name());
    }

    public function testIsUserPaper(): void
    {
        $game = new Game(require "./../app/gameSetUp.php");
        $game->setUser(1);

        self::assertEquals('Paper', $game->getUser()->name());
    }

    public function testIsUserScissors(): void
    {
        $game = new Game(require "./../app/gameSetUp.php");
        $game->setUser(2);

        self::assertEquals('Scissors', $game->getUser()->name());
    }

    public function testIsComputerSet(): void
    {
        $game = new Game(require "./../app/gameSetUp.php");
        $game->setUser(2);
        $game->getResults();

        self::assertNotNull($game->getComputer());
    }

    public function testReturnsResults(): void
    {
        $game = new Game(require "./../app/gameSetUp.php");
        $game->setUser(2);
        $results = $game->getResults();

        self::assertContains($results, ['Tie', 'Won', 'Lost']);
    }
}