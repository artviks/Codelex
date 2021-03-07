<?php

require_once 'Movie.php';
require_once '04-functions.php';

$movies = [
    new Movie('Casino Royale', 'Eon Productions', 'PG13'),
    new Movie('Glass', 'Buena Vista International', 'PG13'),
    new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG')
];

echo displayMovies($movies);