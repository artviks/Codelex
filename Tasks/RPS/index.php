<?php

require "vendor\autoload.php";
$elements = require 'app\gameSetUp.php';

$game = new \App\Game($elements);


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (!isset($_POST["element"]))
    {
        require "app/views/index.view.php";
        return;
    }

    $game->setUser($_POST["element"]);
    $results = $game->getResults();
}

require "app/views/index.view.php";