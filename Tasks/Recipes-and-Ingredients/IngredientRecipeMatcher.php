<?php

class IngredientRecipeMatcher
{
    private IngredientCollection $ingredients;
    private RecipeCollection $recipes;
    private array $canMake = [];

    public function __construct(IngredientCollection $ingredients, RecipeCollection $recipes)
    {
        $this->ingredients = $ingredients;
        $this->recipes = $recipes;
        $this->findRecipes();
    }

    public function recipes(): array
    {
        return $this->canMake;
    }

    private function findRecipes(): void
    {
        foreach ($this->subSetsOfIngr() as $set) {
            $this->canMake[implode(', ', $set)] = [];
            foreach ($this->recipes->getCollection() as $recipe) {
                if (count(array_intersect($recipe->getIngredients()->getNames(), $set)) === count($set)) {
                    $this->canMake[implode(', ', $set)][] = $recipe;
                }
            }
        }
    }

    private function subSetsOfIngr(): array
    {
        $results = [[]];

        foreach ($this->ingredients->getCollection() as $ingredient) {
            foreach ($results as $combination) {
                $results[] = array_merge(array($ingredient->getName()), $combination);
            }
        }

        unset($results[0]);
        return $results;
    }
}
