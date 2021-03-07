<?php

function getPG(array $movies): array
{
    foreach ($movies as $movie) {
        if (!($movie instanceof Movie)) {
            throw new InvalidArgumentException('All elements in array are not instances of Movie class');
        }
    }

    return array_filter($movies,
        fn($movie) => $movie->getRating()[0] . $movie->getRating()[1] === 'PG'
    );
}

function displayMovie(Movie $movie): string
{
    return $movie->getTitle() . ', studio ' . $movie->getStudio() . ', rating: ' . $movie->getRating();
}

function displayMovies(array $movies): string
{
    $result = [];
    foreach ($movies as $movie) {
        $result[] = displayMovie($movie);
    }
    return implode(PHP_EOL, $result);
}