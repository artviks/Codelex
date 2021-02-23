<?php

class Beverage
{
    public string $beverage;
    public int $price;

    public function __construct(string $beverage, int $price)
    {
        $this->beverage = $beverage;
        $this->price = $price;
    }
}

class Wallet
{
    public array $coins;
    public array $acceptedCoins = [
        '1c' => 1,
        '2c' => 2,
        '5c' => 5,
        '10c' => 10,
        '20c' => 20,
        '50c' => 50,
        '1eur' => 100,
        '2eur' => 200,
    ];

    public function __construct(array $coins)
    {
        $this->coins = $coins;
    }

//    public function areTheseCoins(): bool {
//    }

    public function coinsToMoney(array $coins): int
    {
        $money = 0;
        foreach ($this->acceptedCoins as $acceptedCoin => $value) {
            foreach ($coins as $coin) {
                if ($coin === $acceptedCoin) {
                    $money += $value;
                }
            }
        }
        return $money;
    }
}

class CoffeeMachine
{
    private Beverage $beverage;
    public array $coinsIn;
    private array $acceptedCoins;
    private Wallet $userWallet;

    public function __construct(Wallet $userWallet, Beverage $beverage, array $coinsIn)
    {
        $this->userWallet = $userWallet;
        $this->beverage = $beverage;
        $this->coinsIn = $coinsIn;
        $this->acceptedCoins = $this->userWallet->acceptedCoins;
    }

    public function enoughMoneyInWallet(): bool
    {
        if ($this->userWallet->coinsToMoney($this->userWallet->coins) < $this->beverage->price) {
            throw new Error('Not enough money in wallet!');
        }
        return true;
    }

    public function enoughMoneyIn(): bool
    {
        if ($this->userWallet->coinsToMoney($this->coinsIn) < $this->beverage->price) {
            throw new Error('Not enough money in machine!');
        }
        return true;
    }

    public function returnCoins(): array
    {
        $return = $this->userWallet->coinsToMoney($this->coinsIn) - $this->beverage->price;
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
        return $returnCoins;
    }
}

function displayAcceptedCoins(Wallet $wallet): string
{
    return 'Accepted coins: ' . implode(' | ', array_keys($wallet->acceptedCoins)) . PHP_EOL;
}

function acceptCoins(): array
{
    $input = readline('Insert coins (use `,` as separator): ');
    $coinsIn = preg_replace('/\s+/', '', $input);
    return explode(',', $coinsIn);
}

function displayWallet(Wallet $userWallet): string
{
    return PHP_EOL . 'User wallet balance: ' . $userWallet->coinsToMoney($userWallet->coins) . PHP_EOL
        . 'Coins: ' . implode(' | ', $userWallet->coins) . PHP_EOL . PHP_EOL;
}

function transaction(Wallet $userWallet): array
{
    $coins = acceptCoins();

    foreach ($coins as $coin) {
        foreach ($userWallet->coins as $key => $walletCoin) {
            if ($coin === $walletCoin) {
                unset($userWallet->coins[$key]);
                break;
            }
            if (!in_array($coin, $userWallet->coins, true)) {
                throw new Error("Users wallet does not have so many $coin coins");
            }
        }
    }

    return $coins;
}

function beverageMenu($beverages): string
{
    $menu = [];
    $i = 0;
    foreach ($beverages as $beverage) {
        $price = number_format($beverage->price / 100, 2);
        $menu[] = "$i. {$beverage->beverage} => \xE2\x82\xAc $price";
        $i++;
    }
    return implode(PHP_EOL, $menu);
}

$wallet = new Wallet([]);
echo displayWallet($wallet) . displayAcceptedCoins($wallet);

$coinsInWallet = acceptCoins();
$userWallet = new Wallet($coinsInWallet);
echo displayWallet($userWallet);

$beverages = [
    new Beverage('Black Coffee', 213),
    new Beverage('Latte', 267),
    new Beverage('Tea', 149)
];
echo beverageMenu($beverages) . PHP_EOL;

$beverage = $beverages[readline('Choose Your beverage: ')];
$coffeeMachineTest = new CoffeeMachine($userWallet, $beverage, []);
$coffeeMachineTest->enoughMoneyInWallet();

$coinsInMachine = transaction($userWallet);
$coffeeMachine = new CoffeeMachine($userWallet, $beverage, $coinsInMachine);
if ($coffeeMachine->enoughMoneyIn()) {
    echo "Here is your {$beverage->beverage}!";
}

$userWallet->coins = array_merge($userWallet->coins, $coffeeMachine->returnCoins());

echo displayWallet($userWallet);



