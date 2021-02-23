<?php

class Beverage
{
    private string $beverage;
    private int $price;

    public function __construct(string $beverage, int $price)
    {
        $this->beverage = $beverage;
        $this->price = $price;
    }

    public function getBeverage(): string
    {
        return $this->beverage;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

class CoffeeMaker
{
    private Beverage $beverage;
    private int $money;
    private array $acceptedCoins = [
        '1c' => 1,
        '2c' => 2,
        '5c' => 5,
        '10c' => 10,
        '20c' => 20,
        '50c' => 50,
        '1eur' => 100,
        '2eur' => 200,
    ];

    public function __construct(array $coinsIn, Beverage $beverage)
    {
        $this->beverage = $beverage;
        $this->money = $this->coinsToMoney($coinsIn);
    }

    public function getMoney(): int
    {
        return $this->money;
    }

    public function getAcceptedCoins(): array
    {
        return $this->acceptedCoins;
    }

    public function coinsToMoney(array $coinsIn): int
    {
        $money = 0;
        foreach ($this->acceptedCoins as $acceptedCoin => $value) {
            foreach ($coinsIn as $coin) {
                if ($coin === $acceptedCoin) {
                    $money += $value;
                }
            }
        }
        return $money;
    }

    public function enoughMoney(): bool
    {
        return $this->money >= $this->beverage->getPrice();
    }

    public function returnCoins(): string
    {
        $return = $this->money - $this->beverage->getPrice();
        $returnCoins = [];
        foreach (array_reverse($this->acceptedCoins) as $coin => $value) {
            $coinCount = floor($return / $value);
            if ($coinCount > 0) {
                for ($i = 0; $i < $coinCount; $i++) {
                    $returnCoins[] = $coin;
                    $return -= $value;
                }
            }
        }
        return implode(' | ', $returnCoins);
    }
}


function beverageMenu($beverages): string
{
    $menu = [];
    $i = 0;
    foreach ($beverages as $beverage) {
        $price = number_format($beverage->getPrice() / 100, 2);
        $menu[] = "$i. {$beverage->getBeverage()} => \xE2\x82\xAc $price";
        $i++;
    }
    return implode(PHP_EOL, $menu);
}

function acceptCoins(Beverage $beverage): array
{
    $coinsIn = [];
    do {
        $coinsIn[] = readline('Insert: ');
        $coffeeMaker = new CoffeeMaker($coinsIn, $beverage);
        $sum = number_format($coffeeMaker->getMoney() / 100, 2);
        $neededMoney = number_format(($coffeeMaker->getMoney() - $beverage->getPrice()) / 100, 2);
        echo "Accepted money: \xE2\x82\xAc" . $sum . ' '
            . "Balance: \xE2\x82\xAc" . $neededMoney . PHP_EOL;
    } while (!$coffeeMaker->enoughMoney());
    return $coinsIn;
}

$beverages = [
    new Beverage('Black Coffee', 213),
    new Beverage('Latte', 267),
    new Beverage('Tea', 149)
];

echo beverageMenu($beverages) . PHP_EOL;

$beverage = $beverages[readline('Choose Your beverage: ')];

$coffeeMaker = new CoffeeMaker([], $beverage);

echo PHP_EOL . 'Insert one coin at a time. Coins accepted: ' . PHP_EOL
    . implode(' | ', array_keys($coffeeMaker->getAcceptedCoins())) . PHP_EOL;

$coffeeMaker = new CoffeeMaker(acceptCoins($beverage), $beverage);

if ($coffeeMaker->enoughMoney()) {
    echo PHP_EOL . $beverage->getBeverage() . ' is ready!' . PHP_EOL;
}

echo PHP_EOL . 'Coins left to You: ' . PHP_EOL
    . $coffeeMaker->returnCoins() . PHP_EOL;