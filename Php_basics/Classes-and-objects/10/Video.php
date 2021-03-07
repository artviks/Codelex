<?php

class Video
{
    private string $title;
    private string $flag = 'returned';
    private array $ratings = [];

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getFlag(): string
    {
        return $this->flag;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function checkOut(): void
    {
        $this->flag = 'rented';
    }

    public function returnVideo(): void
    {
        $this->flag = 'returned';
    }

    public function rate(int $rating): void
    {
        if ($rating<0 && $rating>10) {
            throw new OutOfRangeException('Can rate only 0-10');
        }
        $this->ratings[] = $rating;
    }

    public function averageRating(): string
    {
        if (count($this->ratings) > 0) {
            return number_format(array_sum($this->ratings) / count($this->ratings), 1);
        }
        return 'Not rated.';
    }

}