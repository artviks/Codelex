<?php

namespace App\elements;

use App\Element;

class Paper implements Element
{
    public function wins(): string
    {
        return Rock::class;
    }

    public function name(): string
    {
        $name = explode('\\', self::class);
        return end($name);
    }
}