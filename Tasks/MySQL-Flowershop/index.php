<?php

require 'vendor/autoload.php';

$shop = new \Shop\models\Shop();

FastRouter::load(require 'app/routes.php', $shop);