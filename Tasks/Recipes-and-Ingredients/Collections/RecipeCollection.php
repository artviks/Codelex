<?php

require_once 'Collection.php';

class RecipeCollection extends Collection
{
    public function setOne(Recipe $recipe): void
    {
        $this->items[] = $recipe;
    }
}