<?php

class Element
{
    public string $name;
    public int $value;

    public function __construct(string $name, int $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
}
