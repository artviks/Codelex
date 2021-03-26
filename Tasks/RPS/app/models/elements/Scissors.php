<?php

namespace App\elements;

use App\Element;

class Scissors implements Element
{
    public function wins(): string
    {
        return Paper::class;
    }

    public function name(): string
    {
        $name = explode('\\', self::class);
        return end($name);
    }
}