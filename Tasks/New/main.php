<?php

require_once 'Flower.php';
require_once 'FlowerCollection.php';
require_once 'Suppliers/Gardener.php';
require_once 'Suppliers/LocalWarehouse.php';
require_once 'Suppliers/ExpensiveWarehouse.php';
require_once 'FlowerShop.php';
require_once 'DisplayFlowerShop.php';


$gardener = new Gardener('Gardener');
$gardener->grow([
    new Flower('Yellow Tulip', 10),
    new Flower('Red Tulip', 10),
    new Flower('Blue Tulip', 10),
    new Flower('White Rose', 10),
    new Flower('Pink Rose', 10),
    new Flower('Red Rose', 10),
]);

$local = new LocalWarehouse('Local Warehouse');
$local->buyFlower($gardener->deliverFlower(new Flower('Red Tulip', 4)));

$expensive = new ExpensiveWarehouse('Other Warehouse');
$expensive->buyFlower($gardener->deliverFlower(new Flower('Red Tulip', 2)));

$order = new Flower('Red Tulip', 7);
$suppliers = [$gardener, $local, $expensive];

$shop = new FlowerShop($suppliers);
$shop->order($order);

$view = new DisplayFlowerShop($shop);
//$view->menu();

var_dump($shop->shipOrder());
//var_dump($local->showStock());