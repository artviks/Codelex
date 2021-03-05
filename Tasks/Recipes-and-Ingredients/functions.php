<?php

function displayMatcher(IngredientRecipeMatcher $matcher): void
{
    foreach ($matcher->recipes() as $ingredient => $recipes) {

        if (empty($recipes)) {
            echo 'Sorry, we do not have recipe with these ingredients: ' . $ingredient . PHP_EOL;
        }

        if (!empty($recipes)) {
            echo 'With ' . $ingredient . ' you can make: ';

            foreach ($recipes as $i => $recipe) {
                if ($i < count($recipes) - 1) {
                    echo $recipe->getName() . ', ';
                } else {
                    echo $recipe->getName() . '.';
                }
            }

            echo PHP_EOL;

            foreach ($recipes as $i => $recipe) {
                echo $recipe->getName() . ' missing: '
                    . implode(', ', array_diff($recipe->getIngredients()->getNames()
                        , explode(', ', $ingredient))) . PHP_EOL;
            }
        }

        echo PHP_EOL;
    }
}