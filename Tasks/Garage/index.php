<?php

require_once "vendor/autoload.php";

$id = key($_POST);
$status = $_POST[$id];

$app = new \App\App();
$app->setStatus($id, $status);

$table = $app->getData();

require_once 'app/Views/index.view.php';