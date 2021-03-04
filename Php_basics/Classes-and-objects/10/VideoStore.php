<?php

class VideoStore
{
    private array $videos = [];

    public function addVideo(string $title): void
    {
        $this->videos[] = new Video($title);
    }

    public function rentVideo(string $title): void
    {
        $this->videos[$this->findVideo($title)]->checkOut();
    }

    public function returnVideo(string $title): void
    {
        $this->videos[$this->findVideo($title)]->returnVideo();
    }

    public function rateVideo(string $title, int $rating): void
    {
        $this->videos[$this->findVideo($title)]->rate($rating);
    }

    public function averageRating(string $title): float
    {
        $this->videos[$this->findVideo($title)]->averageRating();
    }

    public function getVideos(): array
    {
        return $this->videos;
    }

    public function isVideoInStore(string $title): bool
    {
        return $this->findVideo($title) !== null;
    }

    private function findVideo(string $title): ?int
    {
        foreach ($this->videos as $index => $video) {
            if ($video->getTitle() === $title) {
                return $index;
            }
        }
        return null;
    }

}