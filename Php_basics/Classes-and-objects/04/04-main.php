<?php

require_once 'Movie.php';

function getPG(array $movies): array
{
    foreach ($movies as $movie) {
        if (!($movie instanceof Movie)) {
            throw new InvalidArgumentException('All elements in array are not instances of Movie class');
        }
    }

    return array_filter($movies,
            fn($movie) => $movie->getRating()[0].$movie->getRating()[1] === 'PG'
        );
}

$movies = [
    new Movie('Casino Royale', 'Eon Productions', 'PG13'),
    new Movie('Glass', 'Buena Vista International', 'PG13'),
    new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG')
];

var_dump(getPG($movies));