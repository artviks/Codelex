<?php


class Game
{
    public array $board = [
        [' ', ' ', ' '],
        [' ', ' ', ' '],
        [' ', ' ', ' ']
    ];

    public function move(): void
    {
        $row = readline("`{$this->isTurn()}`, choose your location Row: ");
        $column = readline('Column: ');
        if ($this->cellIsOpen($row, $column)) {
            $this->board[$row][$column] = $this->isTurn();
        }
    }

    public function isTurn(): string
    {
        $countX = 0;
        $countO = 0;

        foreach ($this->board as $row) {
            $countInRowX = array_filter($row, static function ($cell) {
                return $cell === 'X';
            });
            $countInRowO = array_filter($row, static function ($cell) {
                return $cell === 'O';
            });
            $countX += count($countInRowX);
            $countO += count($countInRowO);
        }

        return $countX === $countO ? 'X' : 'O';
    }

    public function cellIsOpen(int $row, int $column): bool
    {
        return $this->board[$row][$column] === ' ';
    }

    public function getWinner(): string
    {
        $winComb = [[00, 01, 02], [10, 11, 12], [20, 21, 22], [00, 10, 20], [01, 11, 21], [02, 12, 22]];
        $XComb = [];
        $OComb = [];

        $i = 0;
        $j = 0;
        foreach ($this->board as $row) {
            foreach ($row as $column) {
                if ($column === 'X') {
                    $XComb[] = $i . $j;
                }
                if ($column === 'O') {
                    $OComb[] = $i . $j;
                }
                $j++;
            }
            $i++;
        }

        foreach ($winComb as $combinations) {
            if (in_array($combinations[0], $XComb, false) && in_array($combinations[1], $XComb, false) && in_array($combinations[2], $XComb, false)) {
                return 'X';
            }
            if (in_array($combinations[0], $OComb, false) && in_array($combinations[1], $OComb, false) && in_array($combinations[2], $OComb, false)) {
                return 'O';
            }
        }
        return '-';
    }

    public function isTie(): bool
    {
        $countEmpty = 0;

        foreach ($this->board as $row) {
            $countInRow = array_filter($row, static function ($cell) {
                return $cell === ' ';
            });
            $countEmpty += count($countInRow);
        }

        return $this->getWinner() === '-' && $countEmpty === 0;
    }

}

$game = new Game();

function displayBoard(object $game): void
{
    echo " {$game->board[0][0]} | {$game->board[0][1]} | {$game->board[0][2]}" . PHP_EOL;
    echo "---+---+---\n";
    echo " {$game->board[1][0]} | {$game->board[1][1]} | {$game->board[1][2]}" . PHP_EOL;
    echo "---+---+---\n";
    echo " {$game->board[2][0]} | {$game->board[2][1]} | {$game->board[2][2]}" . PHP_EOL;
}

function run(object $game): string
{
    do {
        $game->move();
        displayBoard($game);
    } while (!$game->isTie() && $game->getWinner() === '-');

    if ($game->isTie()) {
        exit('It is a tie!');
    }
    if ($game->getWinner() !== '-') {
        exit($game->getWinner() . ' has won!');
    }
}

run($game);