<?php

class Product
{
    private string $name;
    private float $price;
    private int $amount;

    public function __construct(string $name, float $priceAtStart, int $amountAtStart)
    {
        $this->name = $name;
        $this->price = $priceAtStart;
        $this->amount = $amountAtStart;
    }

    public function printProduct(): string
    {
        return "$this->name, price € " . number_format($this->price, 2)
            . ", amount $this->amount";
    }

    public function changeQuantity(int $amount): void
    {
        $this->amount = $amount;
    }

    public function changePrice(float $price): void
    {
        $this->price = $price;
    }
}


$products = [
    new Product("Logitech mouse", 70.00, 14),
    new Product("iPhone 5s", 999.99, 3),
    new Product("Epson EB-U05", 440.46, 1)
];

foreach ($products as $product) {
    echo $product->printProduct() . PHP_EOL;
}

$products[1]->changePrice(899.99);
$products[1]->changeQuantity(1);

echo PHP_EOL . $products[1]->printProduct() . PHP_EOL;