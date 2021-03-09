<?php

require_once 'Flower.php';
require_once 'FlowerCollection.php';
require_once 'Suppliers/Gardener.php';
require_once 'Suppliers/LocalWarehouse.php';
require_once 'Suppliers/OtherWarehouse.php';
require_once 'FlowerShop.php';


$gardener = new Gardener();
$gardener->grow([
    new Flower('YellowTulip', 10, 100),
    new Flower('RedTulip', 10, 110),
    new Flower('BlueTulip', 10, 120),
    new Flower('WhiteRose', 10, 200),
    new Flower('PinkRose', 10, 210),
    new Flower('RedRose', 10, 220),
]);

$local = new LocalWarehouse();
$local->buyFlower($gardener->deliverFlower(new Flower('RedTulip', 4, 110)));

$other = new OtherWarehouse();
$other->buyFlower($gardener->deliverFlower(new Flower('RedTulip', 2, 110)));

$input = 'RedTulip 9';
$data = explode(' ', $input);

$order = new Flower($data[0], (int)$data[1]);
$suppliers = [$gardener, $local, $other];

$shop = new FlowerShop($suppliers);
$shop->order($order);
var_dump($shop->order);

$shop->remove();

var_dump($shop->getFlowers());
