<?php

require_once 'FlowerShop.php';

$localGardener = new Gardener();
$localGardener->growFlowers([
    new Flower('Yellow Tulip', 200),
    new Flower('Red Tulip', 150),
    new Flower('Blue Tulip', 250),
]);
