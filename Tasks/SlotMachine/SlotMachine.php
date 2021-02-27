<?php


class SlotMachine
{
    private int $money = 0;
    private int $bid = 0;
    private array $elements;
    private array $cells = [];

    public function __construct(array $elements)
    {
        $this->elements = $elements;
    }

    public function generateCells(): void
    {
        $this->cells = [];
        for ($i = 0; $i < 9; $i++) {
            $randomElementIndex = random_int(0, count($this->elements) - 1);
            $this->cells[] = $this->elements[$randomElementIndex];
        }
    }

    public function getCells(): array
    {
        return $this->cells;
    }

    public function hasWon()
    {
        $winCombs = [[0, 1, 2], [3, 4, 5], [6, 7, 8], [0, 4, 8], [2, 4, 6]];
        $playedComb = [];
        foreach ($this->cells as $index => $cell) {
            $playedComb[$cell->name][] = $index;
        }

        foreach ($playedComb as $cellName => $combs) {
            foreach ($winCombs as $winComb) {
                if (in_array($winComb[0], $combs, true) && in_array($winComb[1], $combs, true)
                    && in_array($winComb[2], $combs, true)) {
                    return $cellName;
                }
            }
        }
        return 'n';
    }

    public function updateMoney(string $bid): void
    {
        if ($bid === 'bid') {
            $this->setMoney(-$this->bid);
        }

        foreach ($this->elements as $element) {
            if ($this->hasWon() === $element->name) {
                $this->setMoney($element->value * ($this->bid / 10));
            }
        }
    }

    public function setBid(int $bid): string
    {
        if ($bid % 10 === 0 && $bid !== 0) {
            $this->bid = $bid;
            return 'OK';
        }
        return 'Invalid input!';
    }

    public function setMoney(int $money): void
    {
        $this->money += $money;
    }

    public function getMoney(): int
    {
        return $this->money;
    }

    public function checkBounus(string $bonusEl): string {
        if ($this->hasWon() === $bonusEl) {
            return $bonusEl;
        }
        return 'nope';
    }

    public function showCells(): string {
        $display = [''];
        $acc = 0;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $display[] = $this->getCells()[$acc + $j]->name;
            }
            $acc += 3;
            $display[] = PHP_EOL;
        }
        return implode(' ', $display);
    }

}