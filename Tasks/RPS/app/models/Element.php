<?php

namespace App;

interface Element
{
    public function wins(): string;

    public function name(): string;
}