<?php

require_once 'Element.php';
require_once 'SlotMachine.php';

$elements = [
    new Element('A', 5),
    new Element('B', 10),
    new Element('C', 15),
    new Element('X', 0), // tālāk tiek izvēlēts kā tas īpašais elements
    new Element('Y', 25),
];

$slotMachine = new SlotMachine($elements);
$money = readline('Give me Your money (in cents): ');

if ($money >= 10) {
    $slotMachine->setMoney($money);
} else {
    exit('Invalid money!');
}

$bonusElName = 'X';
$continue = 'y';

while ($continue === 'y') {

    $bid = readline('Choose your bid for the game (10, 20, 30, etc.): ');

    $slotMachine->generateCells();

    if (ctype_digit($bid) && $slotMachine->setBid($bid) === 'OK'
        && $slotMachine->checkBounus($bonusElName) === 'nope') {

        $slotMachine->generateCells();
        $slotMachine->updateMoney();
        echo $slotMachine->showCells();

        if ($slotMachine->checkBounus($bonusElName) === $bonusElName) {

            for ($i = 0; $i < 5; $i++) {
                $slotMachine->generateCells();
                $slotMachine->updateMoney();
                echo $slotMachine->showCells();
            }
        }

    } else {
        echo 'Invalid bid' . PHP_EOL;
    }

    if ($slotMachine->getMoney() < 10) {
        exit('You are out of money!');
    }

    $continue = readline("Balance {$slotMachine->getMoney()}. Continue (y/n): ");
}


