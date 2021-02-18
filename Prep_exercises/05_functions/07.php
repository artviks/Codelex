<?php

$person = new stdClass();
$person->name = 'John Doe';
$person->licenses = ['A', 'B'];
$person->chash = 1000;

class Gun
{
    public string $license;
    public int $price;
    public string $name;

    public function __construct(string $license, int $price, string $name)
    {
        $this->license = $license;
        $this->price = $price;
        $this->name = $name;
    }
}

$guns = [
    new Gun('A', 800, 'Colt'),
    new Gun('B', 2500, 'AK-47'),
    new Gun('C', 800, 'Springfield')
];

$personCanBuy = array_filter($guns, static function ($gun) use ($person)
    {
        return $gun->price <= $person->chash && in_array($gun->license, $person->licenses, true);
    }
);

var_dump($personCanBuy);