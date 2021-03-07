<?php

class DisplayVideoStore
{
    private VideoStore $store;

    public function __construct(VideoStore $store)
    {
        $this->store = $store;
    }

    public function setStore(VideoStore $store): void
    {
        $this->store = $store;
    }

    public function run(): void {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline('Your choice => ');

            $this->chooseAction($command);
        }
    }

    private function chooseAction(int $command): void
    {
        switch ($command) {
            case 0:
                echo "Bye!";
                die;
            case 1:
                $this->store->addVideo(readline('Add movie: '));
                break;
            case 2:
                $movie = readline('Rent movie: ');

                if ($this->store->isVideoInStore($movie)) {
                    $this->store->rentVideo($movie);
                } else {
                    echo 'We do not have this Movie.' . PHP_EOL;
                }
                break;
            case 3:
                $movie = readline('Return: ');

                if ($this->store->isVideoInStore($movie)) {
                    $this->store->returnVideo($movie);
                } else {
                    echo 'Something went wrong. Check movie`s title';
                    break;
                }

                $rating = readline('Rating (0 - 10): ');

                if ($rating > 0 && $rating <= 10) {
                    $this->store->rateVideo($movie, $rating);
                } else {
                    echo 'Rating out of range';
                }
                break;
            case 4:
                foreach ($this->store->getVideos() as $video) {
                    echo 'Title: ' . $video->getTitle() . PHP_EOL
                        . 'Status: ' . $video->getFlag() . PHP_EOL
                        . 'Rating: ' . $video->averageRating() . PHP_EOL;
                }
                break;
            default:
                echo "Sorry, I don't understand you..";
        }
    }
}