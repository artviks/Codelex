<?php

require_once 'Ingredient.php';
require_once 'Collections/IngredientCollection.php';
require_once 'Recipe.php';
require_once 'Collections/RecipeCollection.php';

$recipes = new RecipeCollection();
$recipes->setMany([
    new Recipe('Salad', [
        new Ingredient('tomato'),
        new Ingredient('cucumber'),
        new Ingredient('olive oil')
    ]),
    new Recipe('Sandwich', [
        new Ingredient('tomato'),
        new Ingredient('cucumber'),
        new Ingredient('mayo'),
        new Ingredient('bread'),
        new Ingredient('cheese')
    ]),
    new Recipe('Pizza', [
        new Ingredient('tomato'),
        new Ingredient('sausage'),
        new Ingredient('mayo'),
        new Ingredient('flour'),
        new Ingredient('cheese')
    ]),
    new Recipe('TurboSalad', [
        new Ingredient('tomato'),
        new Ingredient('garlic'),
        new Ingredient('cheese'),
        new Ingredient('mayo'),
    ]),
    new Recipe('NotSalad', [
        new Ingredient('banana'),
        new Ingredient('garlic'),
        new Ingredient('cheese'),
        new Ingredient('orange'),
    ])
]);