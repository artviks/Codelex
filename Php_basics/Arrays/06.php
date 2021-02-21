<?php

class Game
{
    public array $words = ['word'];
    public array $chosenWord = [];
    public array $displayWord = [];
    public array $missedChars = [];
    public int $allowedMisses = 2;

    public function chooseWord(): void
    {
        $int = count($this->words) - 1;
        $this->chosenWord = str_split($this->words[random_int(0, $int)]);
        foreach ($this->chosenWord as $char) {
            $this->displayWord[] = '_';
        }

    }

    public function getWord(): string
    {
        return implode(' ', $this->displayWord);
    }

    public function getMisses(): string
    {
        return implode(' ', $this->missedChars);
    }

    public function guessCorrect(string $char): bool
    {
        return in_array($char, $this->chosenWord, true);
    }

    public function guess(): void
    {
        $char = readline('Guess: ');
        if ($this->guessCorrect($char)) {
            $index1 = array_search($char, $this->chosenWord, true);

            if ($this->displayWord[$index1] !== '_') {
                $slicedWord = array_slice($this->chosenWord, $index1 + 1);
                $index2 = array_search($char, $slicedWord, true);
                $this->displayWord[$index2 + $index1 + 1] = $char;
            }

            if ($this->displayWord[$index1] === '_') {
                $this->displayWord[$index1] = $char;
            }
        }

        if (!$this->guessCorrect($char)) {
            $this->missedChars[] = $char;
        }
    }

    public function isWon(): bool
    {
        $count = count($this->displayWord);
        foreach ($this->displayWord as $char) {
            if ($char !== '_') {
                --$count;
            }
        }

        return $count === 0;
    }

    public function isLost(): bool
    {
        $misses = $this->allowedMisses;
        foreach ($this->missedChars as $char) {
            --$misses;
        }
        return $misses <= 0;
    }

    public function restart(): void
    {
        $this->missedChars = [];
        $this->displayWord = [];
        $this->chosenWord = [];
        $this->chooseWord();
    }

}

function displayGame(object $game): string
{
    return '-=-=-=-=-=-=-=-=-=-=-=-=-=-' . PHP_EOL
        . 'Word: ' . $game->getWord() . PHP_EOL
        . 'Misses: ' . $game->getMisses() . PHP_EOL;
}

$game = new Game();

function run(object $game)
{
    $game->chooseWord();
    do {
        do {
            echo displayGame($game);
            $game->guess();
        } while (!$game->isWon() && !$game->isLost());

        echo displayGame($game);
        if ($game->isWon()) {
            echo 'YOU GOT IT!';
        }
        if ($game->isLost()) {
            echo 'Bad luck!';
        }
        echo PHP_EOL;
        $play = readline('Play "again" or "quit"? ');
        if ($play === 'again') {
            $game->restart();
        }
    } while ($play === 'again');
}

run($game);