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

$local = new JSONWarehouse();
$local->buyFlower($gardener->deliverFlower(new Flower('RedTulip', 4, 110)));

$other = new DBWarehouse();
$other->buyFlower($gardener->deliverFlower(new Flower('RedTulip', 2, 110)));


$shop = new FlowerShop([$local, $gardener, $other]);

foreach ($shop->getFlowers()->flowers() as $flower) {
    echo $flower->name() . ', ' . $flower->amount() . ' pcs, price ' . $flower->price() . PHP_EOL;
}


$input = readline('Choose: ');
$data = explode(' ', $input);
$order = new Flower($data[0], (int)$data[1]);
$shop->order($order);

$gender = readline('Gender: ');
$shop->gender($gender);

echo 'Total price: ' . $shop->totalPrice();

$shop->remove();