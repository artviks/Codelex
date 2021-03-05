<?php

require_once 'Collection.php';

class IngredientCollection extends Collection
{
    public function setOne(Ingredient $ingredient): void
    {
        $this->items[] = $ingredient;
    }
}