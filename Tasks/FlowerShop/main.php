<?php

require_once 'Flower.php';
require_once 'FlowerCollection.php';
require_once 'Suppliers/Gardener.php';
require_once 'Suppliers/LocalWarehouse.php';
require_once 'Suppliers/OtherWarehouse.php';
require_once 'FlowerShop.php';


$gardener = new Gardener();
$gardener->grow([
    new Flower('Yellow Tulip', 10, 100),
    new Flower('Red Tulip', 10, 110),
    new Flower('Blue Tulip', 10, 120),
    new Flower('White Rose', 10, 200),
    new Flower('Pink Rose', 10, 210),
    new Flower('Red Rose', 10, 220),
]);

$local = new LocalWarehouse();
$local->buyFlower($gardener->deliverFlower(new Flower('Red Tulip', 4, 110)));

$other = new OtherWarehouse();
$other->buyFlower($gardener->deliverFlower(new Flower('Red Tulip', 2, 110)));



$suppliers = [$gardener, $local, $other];

$shop = new FlowerShop($suppliers);
var_dump($shop->getFlowers());
