<?php

require_once 'Video.php';
require_once 'VideoStore.php';

$store = new VideoStore();

while (true) {
    echo "Choose the operation you want to perform \n";
    echo "Choose 0 for EXIT\n";
    echo "Choose 1 to fill video store\n";
    echo "Choose 2 to rent video (as user)\n";
    echo "Choose 3 to return video (as user)\n";
    echo "Choose 4 to list inventory\n";

    $command = (int)readline('Your choice => ');

    switch ($command) {
        case 0:
            echo "Bye!";
            die;
        case 1:
            $store->addVideo(readline('Add movie: '));
            break;
        case 2:
            $movie = readline('Rent movie: ');
            if ($store->isVideoInStore($movie)) {
                $store->rentVideo($movie);
            } else {
                echo 'We do not have this Movie.' . PHP_EOL;
            }
            break;
        case 3:
            $movie = readline('Return: ');
            $rating = readline('Rating (0 - 10): ');
            if ($store->isVideoInStore($movie)) {
                $store->returnVideo($movie);
            } else {
                echo 'Something went wrong. Check movie`s title';
            }
            if ($rating > 0 && $rating <= 10) {
                $store->rateVideo($movie, $rating);
            } else {
                echo 'Rating out of range';
            }
            break;
        case 4:
            foreach ($store->getVideos() as $video) {
                echo 'Title: ' . $video->getTitle() . PHP_EOL
                    . 'Status: ' . $video->getFlag() . PHP_EOL
                    . 'Rating: ' . $video->averageRating() . PHP_EOL;
            }
            break;
        default:
            echo "Sorry, I don't understand you..";
    }
}