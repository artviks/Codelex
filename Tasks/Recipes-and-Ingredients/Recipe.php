<?php

class Recipe
{
    private IngredientCollection $ingredients;
    private string $name;

    public function __construct(string $name, array $ingredients)
    {
        $this->ingredients = new IngredientCollection();
        $this->ingredients->setMany($ingredients);
        $this->name = $name;
    }

    public function getIngredients(): IngredientCollection
    {
        return $this->ingredients;
    }

    public function getName(): string
    {
        return $this->name;
    }
}