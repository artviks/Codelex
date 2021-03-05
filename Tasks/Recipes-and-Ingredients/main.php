<?php


require_once 'IngredientRecipeMatcher.php';
require_once 'recipe-data.php';
require_once 'functions.php';
/** @var $recipes */

$ingredients = new IngredientCollection();
$ingredients->setMany([
    new Ingredient('b'),
    new Ingredient('cheese'),
    new Ingredient('garlic'),
]);

$findRecipes = new IngredientRecipeMatcher($ingredients, $recipes);

displayMatcher($findRecipes);