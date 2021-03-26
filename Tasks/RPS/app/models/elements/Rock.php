<?php

namespace App\elements;

use App\Element;

class Rock implements Element
{
    public function wins(): string
    {
        return Scissors::class;
    }

    public function name(): string
    {
        $name = explode('\\', self::class);
        return end($name);
    }
}
