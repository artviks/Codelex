<?php

function addCodelex(string $text): string
{
    return "$text, Codelex!";
}

echo addCodelex('Hello');