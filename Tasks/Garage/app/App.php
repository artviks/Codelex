<?php

namespace App;

class App
{
    public function getData(): array
    {
        return $this->decode();
    }

    public function setStatus(int $id, string $status): void
    {
        $cars = $this->decode();
        foreach ($cars as $key => $car)
        {
           if ($car['id'] === $id)
           {
               $cars[$key]['status'] = $status . 'ed';
           }
        }
        $this->encode($cars);
    }

    private function decode(): array
    {
        return json_decode(
            file_get_contents(__DIR__ . '/Data/Cars.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    private function encode(array $cars): void
    {
        file_put_contents(
            __DIR__ . '/Data/Cars.json',
            json_encode($cars, JSON_THROW_ON_ERROR)
        );
    }

}